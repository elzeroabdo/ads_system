<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>الإعلانات</title>
</head>
<body>
    <h1>الإعلانات</h1>

    <div>
        <!-- AD_SPOT: header -->
        <h2>Header Ads</h2>
        @foreach($ads as $ad)
            @php
                $spotsArray = json_decode($ad->spots, true);
            @endphp
            <pre>{{ $ad->name }}: {{ implode(', ', $spotsArray) }}</pre> <!-- Debugging Output -->
            @if(in_array('header', $spotsArray))
                <a href="{{ route('ads.click', $ad->id) }}">
                    <img src="{{ $ad->image_url }}" alt="{{ $ad->name }}" style="max-width:100%; height:auto;">
                </a>
            @endif
        @endforeach
    </div>

    <div>
        <!-- AD_SPOT: after-header -->
        <h2>After Header Ads</h2>
        @foreach($ads as $ad)
            @php
                $spotsArray = json_decode($ad->spots, true);
            @endphp
            <pre>{{ $ad->name }}: {{ implode(', ', $spotsArray) }}</pre> <!-- Debugging Output -->
            @if(in_array('after-header', $spotsArray))
                <a href="{{ route('ads.click', $ad->id) }}">
                    <img src="{{ $ad->image_url }}" alt="{{ $ad->name }}" style="max-width:100%; height:auto;">
                </a>
            @endif
        @endforeach
    </div>

    <div>
        <!-- AD_SPOT: left-sidebar -->
        <h2>Left Sidebar Ads</h2>
        @foreach($ads as $ad)
            @php
                $spotsArray = json_decode($ad->spots, true);
            @endphp
            <pre>{{ $ad->name }}: {{ implode(', ', $spotsArray) }}</pre> <!-- Debugging Output -->
            @if(in_array('left-sidebar', $spotsArray))
                <a href="{{ route('ads.click', $ad->id) }}">
                    <img src="{{ $ad->image_url }}" alt="{{ $ad->name }}" style="max-width:100%; height:auto;">
                </a>
            @endif
        @endforeach
    </div>

    <div>
        <!-- AD_SPOT: right-sidebar -->
        <h2>Right Sidebar Ads</h2>
        @foreach($ads as $ad)
            @php
                $spotsArray = json_decode($ad->spots, true);
            @endphp
            <pre>{{ $ad->name }}: {{ implode(', ', $spotsArray) }}</pre> <!-- Debugging Output -->
            @if(in_array('right-sidebar', $spotsArray))
                <a href="{{ route('ads.click', $ad->id) }}">
                    <img src="{{ $ad->image_url }}" alt="{{ $ad->name }}" style="max-width:100%; height:auto;">
                </a>
            @endif
        @endforeach
    </div>

    <div>
        <!-- AD_SPOT: footer -->
        <h2>Footer Ads</h2>
        @foreach($ads as $ad)
            @php
                $spotsArray = json_decode($ad->spots, true);
            @endphp
            <pre>{{ $ad->name }}: {{ implode(', ', $spotsArray) }}</pre> <!-- Debugging Output -->
            @if(in_array('footer', $spotsArray))
                <a href="{{ route('ads.click', $ad->id) }}">
                    <img src="{{ $ad->image_url }}" alt="{{ $ad->name }}" style="max-width:100%; height:auto;">
                </a>
            @endif
        @endforeach
    </div>

</body>
</html>
