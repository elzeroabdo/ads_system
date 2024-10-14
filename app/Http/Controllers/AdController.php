<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdAnalytics;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdController extends Controller
{
    public function showAds(Request $request)
    {
        // الحصول على IP الخاص بالمستخدم
        //$ip = $request->ip();
        $ip = '197.62.202.82'; // IP مصر
        $country = $this->getCountryByIp($ip);
        // جلب الإعلانات المناسبة بناءً على البلد
        $ads = Ad::whereHas('campaign', function ($query) use ($country) {
            $query->where('is_active', true)
                  ->whereDate('start_date', '<=', now())
                  ->whereDate('end_date', '>=', now())
                  ->where(function ($q) use ($country) {
                      $q->whereJsonContains('countries', $country)
                        ->orWhereNull('countries');
                  });
        })->get();
        
     
        

        // تسجيل المشاهدات
        foreach ($ads as $ad) {
            AdAnalytics::updateOrCreate(
                ['ad_id' => $ad->id],
                ['views' => \DB::raw('views + 1')]
            );
        }

        return view('ads.show', compact('ads', 'country'));
    }

    public function adClick(Request $request, $id)
    {
        // تسجيل النقرات
        AdAnalytics::updateOrCreate(
            ['ad_id' => $id],
            ['clicks' => \DB::raw('clicks + 1')]
        );

        // إعادة توجيه المستخدم إلى الرابط المستهدف للإعلان
        $ad = Ad::findOrFail($id);
        return redirect($ad->target_url);
    }

    private function getCountryByIp($ip)
    {
        // استخدام موقع IP info
        $response = Http::get("http://ipinfo.io/{$ip}/json");
        if ($response->successful() && isset($response->json()['country'])) {
            return strtolower($response->json()['country']);  // this will return the country code in lowercase (eg: eg, us)
        }
        return 'global'; // إذا لم يتم العثور على الدولة
    }

    public function updateCampaignStatus()
    {
        // تحديث جميع الحملات المنتهية لتصبح غير مفعلة
        Campaign::where('end_date', '<', now())
                ->where('is_active', true)
                ->update(['is_active' => false]);

        return "Campaign statuses updated";
    }
}
