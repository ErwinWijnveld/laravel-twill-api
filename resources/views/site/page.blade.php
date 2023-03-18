@php
// generate random preview token
$previewToken = Str::random(32);

// // put item in cache
Cache::put($previewToken, $item, now()->addMinutes(1));

// git item slug
$slug = $item->slug . '-preview';

// get frontend url
$frontendUrl = env("FRONTEND_URL", "http://localhost:3000");

// frontend url with preview token
$frontendUrlWithToken = $frontendUrl . "/" . $slug . "?preview_token=" . $previewToken;

@endphp

<iframe src="{{ $frontendUrlWithToken }}" style="
  position: fixed;
  top: 0px;
  bottom: 0px;
  right: 0px;
  width: 100%;
  border: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  z-index: 999999;
  height: 100%;
"></iframe>
