<!-- Web Application Manifest -->
<link rel="manifest" href="{{ route('laravelpwa.manifest') }}">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="{{ $config['theme_color'] }}">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="application-name" content="{{ $config['short_name'] }}">
<link rel="icon" sizes="{{ data_get(end($config['icons']), 'sizes') }}" href="https://bossstack.vn/public/images/icons/icon-512x512.png">
<!-- <link rel="icon" sizes="{{ data_get(end($config['icons']), 'sizes') }}" href="{{ data_get(end($config['icons']), 'src') }}"> -->

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="{{ $config['display'] == 'standalone' ? 'yes' : 'no' }}">
<meta name="apple-mobile-web-app-status-bar-style" content="{{  $config['status_bar'] }}">
<meta name="apple-mobile-web-app-title" content="{{ $config['short_name'] }}">
<!-- <link rel="apple-touch-icon" href="{{ data_get(end($config['icons']), 'src') }}"> -->
<link rel="apple-touch-icon" href="https://fiinves.vn/public/images/icons/icon-512x512.png">


<link href="{{ $config['splash']['640x1136'] }}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['750x1334'] }}" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1242x2208'] }}" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1125x2436'] }}" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['828x1792'] }}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1242x2688'] }}" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1536x2048'] }}" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1668x2224'] }}" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['1668x2388'] }}" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="{{ $config['splash']['2048x2732'] }}" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="{{ $config['background_color'] }}">
<meta name="msapplication-TileImage" content="{{ data_get(end($config['icons']), 'src') }}">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

<div class="add-button">
    <button class="closebtn">x</button>
    <img src="{{ asset('images/phone.png') }}" class="float-phone"><span style="margin-left: 20px;"><span style="font-weight: 700;" id="installapp">Bấm cài đặt APP ngay</span><br> để có thể truy cập nhanh hơn.</span>
    <div class="pointer"> </div>
</div>
<style>
.add-button {
  position: fixed;
    bottom: 20px;
    /* left: 20px;
     */
    left: 50%;
    transform: translate(-50%, 0);
    display: flex;
    padding: 10px 20px;
    color: #000;
    box-shadow: 0 3px 6px -1px rgb(0 0 0 / 12%), 0 6px 25px -4px rgb(137 137 137 / 30%);
    background: #fff;
    border-radius: .275rem;
    max-width: 90%!important;
    align-items: center;
    z-index: 2147483647;
}

.closebtn{
  position: absolute;
  right:0px;
  top:0px;
  transform: translate(50%, -50%);
}

.pointer {
	height: 40px;
    width: 40px;
    background: white;
    margin: 0 auto;
    transform: rotate(45deg) translate(-50%, 0);
    border-radius: 0 0 4px 0;
    margin-top: -22px;
    position: absolute;
    left: 50%;
    bottom: -22px;
    z-index: -1;
}

@keyframes shake {
  0% { transform: translate(1px, 1px) rotate(0deg); }
  10% { transform: translate(-1px, -2px) rotate(-1deg); }
  20% { transform: translate(-3px, 0px) rotate(1deg); }
  30% { transform: translate(3px, 2px) rotate(0deg); }
  40% { transform: translate(1px, -1px) rotate(1deg); }
  50% { transform: translate(-1px, 2px) rotate(-1deg); }
  60% { transform: translate(-3px, 1px) rotate(0deg); }
  70% { transform: translate(3px, 1px) rotate(-1deg); }
  80% { transform: translate(-1px, -1px) rotate(1deg); }
  90% { transform: translate(1px, 2px) rotate(0deg); }
  100% { transform: translate(1px, -2px) rotate(-1deg); }
}

.float-phone {
    width: 30px;
    /* transform-style: preserve-3d;
    animation-name: floating;
    animation-duration: 3s; */
    animation-iteration-count: infinite;
    /* animation-timing-function: ease-in-out;
     */
    animation: shake 1s infinite;
    /* animation-duration: 3s; */
}
</style>
<script>
        
        // Detects if device is on iOS 
const isIos = () => {
  const userAgent = window.navigator.userAgent.toLowerCase();
  return /iphone|ipad|ipod/.test( userAgent );
}
// Detects if device is in standalone mode
const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);

function showIosInstall() {
    const addbt = document.querySelector('.add-button');
    addbt.style.display = 'flex';
    var txt_install = document.querySelector('#installapp');
    txt_install.innerHTML = "Chọn <img width=15 src='{{ asset('images/action.png') }}'> và bấm <img width=20 src='{{ asset('images/add.png') }}'> cài APP";
    document.querySelector('.closebtn').addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        document.querySelector('.add-button').style.display = 'none';
        // this.setState({ showInstallMessage: false });
    });
    this.setState({ showInstallMessage: true });
}
// Checks if should display install popup notification:
if (isIos() && !isInStandaloneMode()) {
//   this.setState({ showInstallMessage: true });
    showIosInstall();
}

let deferredPrompt;
const addBtn = document.querySelector('.add-button');
addBtn.style.display = 'none';

document.querySelector('.closebtn').addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    document.querySelector('.add-button').style.display = 'none';
});
window.addEventListener('beforeinstallprompt', (e) => {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  // Update UI to notify the user they can add to home screen
  addBtn.style.display = 'flex';

  addBtn.addEventListener('click', (e) => {
    // hide our user interface that shows our A2HS button
    addBtn.style.display = 'none';
    // Show the prompt
    deferredPrompt.prompt();
    // Wait for the user to respond to the prompt
    deferredPrompt.userChoice.then((choiceResult) => {
        if (choiceResult.outcome === 'accepted') {
          console.log('User accepted the A2HS prompt');
        } else {
          console.log('User dismissed the A2HS prompt');
        }
        deferredPrompt = null;
      });
  });
});
</script>