import $$ from 'dom7';
import Framework7 from 'framework7/framework7.esm.bundle.js';
import IMask from 'imask';
import Framework7Keypad from 'framework7-plugin-keypad';
// Import F7 Styles
import 'framework7/css/framework7.bundle.css';
import '../js/dist/framework7.keypad.min.js';
// Import Icons and App Custom Styles
import '../css/icons.css';
import '../css/app.css';
// Import Cordova APIs
import '../js/dist/framework7.keypad.min.css';
import cordovaApp from './cordova-app.js';
// Import Routes
import routes from './routes.js';

Framework7.use(Framework7Keypad);


var app = new Framework7({
  root: '#app', // App root element
  id: 'app.zhilfond.kz', // App bundle ID
  name: 'Zhilfond', // App name
  theme: 'md', // Automatic theme detection
  // App root data
    touch: { 
disableContextMenu: false,
},
data: function () {
  return {
    user: {
      fam: 'null',
      im: 'null',
  ot:'null',
  phone:'null'
    },
  routs: {
  rout:'home',
  pass:"null",
  id:"null",
  token:"null",
  token_app:'null'
  },
  news:{
  array:[]
  },
  proga:{
    array:[]
  }

  };
},
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,


  // Input settings
  input: {
    scrollIntoViewOnFocus: Framework7.device.cordova && !Framework7.device.electron,
    scrollIntoViewCentered: Framework7.device.cordova && !Framework7.device.electron,
  },
  view:{
    iosSwipeBack:true,
    mdSwipeBack:true
  },
  // Cordova Statusbar settings
  statusbar: {
    overlay: Framework7.device.cordova && Framework7.device.ios || 'auto',
    iosOverlaysWebView: true,
    androidOverlaysWebView: false,
    iosTextColor:'white',
    iosBackgroundColor:'#073974',
	androidTextColor:'white',
	androidBackgroundColor:'#073974',
  },
  on: {
    init: function () {
		
      var f7 = this;
      if (f7.device.cordova) {
        // Init cordova APIs (see cordova-app.js)
        cordovaApp.init(f7);
      }
	  


    },
  },

});


  
$$('#vyhod').on('click',function(){

	app.panel.close();
	var lang = JSON.parse(localStorage.getItem("f7form-lang"));
	if (lang.lang == "ru")
	app.dialog.create({
    title: 'Выход',
    text: 'Вы точно хотите выйти из личного кабинета?',
    buttons: [
      {
        text: 'Нет',
		color:'red',
      },
      {
        text: 'Да',
		onClick:function(){
		app.form.storeFormData('user', {
		'id': 'null',
		'token':'null',
		});
		$$('#li_moi').hide();
		$$('#div_vyhod').hide();
		},
      },
    ],
    verticalButtons: false,
  }).open();
else
app.dialog.create({
    title: 'Шығу',
    text: 'Сіз расында жеке кабинеттен шыққыңыз келеді ме?',
    buttons: [
      {
        text: 'Жоқ',
		color:'red',
      },
      {
        text: 'Ия',
		onClick:function(){
		app.form.storeFormData('user', {
		'id': 'null',
		'token':'null',
		});
		$$('#li_moi').hide();
		$$('#div_vyhod').hide();
		},
      },
    ],
    verticalButtons: false,
  }).open();
});
