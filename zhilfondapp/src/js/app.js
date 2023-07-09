import $$ from 'dom7';
import Framework7 from 'framework7/framework7.esm.bundle.js';

// Import F7 Styles
import 'framework7/css/framework7.bundle.css';
// Import Icons and App Custom Styles
import '../css/icons.css';
import '../css/app.css';

// Import Routes
import routes from './routes.js';

var app = new Framework7({
  root: '#app', // App root element

  name: 'Zhilfond', // App name
  theme: 'aurora', // Automatic theme detection
  // App root data
  data: function () {
    return {
      user: {
        firstName: 'John',
        lastName: 'Doe',
        status:0,
        id:0
      },

    };
  },
  view: {
    //pushState: true,
	//pushStateSeparator:"#page",
    stackPages: true,
	animate: false,
  },
  panel: {
        leftBreakpoint: 1024,
      },
  // App root methods
  methods: {
    helloWorld: function () {
      app.dialog.alert('Hello World!');
    },
  },
  // App routes
  routes: routes,
});


/*if (app.views.main.router.url == "home" || app.views.main.router.url == "/")
{

var view = app.views.create('.view-main', {});
view.router.navigate('/home/');
}
*/
$$('#vyhod').on('click',function(){
  app.dialog.confirm("Вы точно хотите выйти из аккаунта?",function(){
  app.form.removeFormData("user");
  var view = app.views.create('.view-main', {});
  view.router.navigate('/auth/',{reloadCurrent:true});
  setTimeout(() => {
    location.href = "";
  }, 500);
 
  });
  });