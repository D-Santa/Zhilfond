
import HomePage from '../pages/home.f7.html';
import News from '../pages/news.f7.html';
import Add_news from '../pages/add_news.f7.html';
import Edit_news from '../pages/edit_news.f7.html';
import Dolg from '../pages/dolg.f7.html';
import Moi from '../pages/moi.f7.html';
import Otvet from '../pages/otvet.f7.html';
import Info from '../pages/info.f7.html';
import Add_info from '../pages/add_info.f7.html';
import Edit_info from '../pages/edit_info.f7.html';
import Notification from '../pages/notification.f7.html';
import Add_notification from '../pages/add_notification.f7.html';
import Edit_notification from '../pages/edit_notification.f7.html';
import Kontakt from '../pages/kontakt.f7.html';
import Ochered from '../pages/ochered.f7.html';
import Ucher from '../pages/ucher.f7.html';
import Opri from '../pages/opri.f7.html';
import Teh from '../pages/teh.f7.html';
import Proga from '../pages/proga.f7.html';
import Add_proga from '../pages/add_proga.f7.html';
import Edit_proga from '../pages/edit_proga.f7.html';
import Zapis from '../pages/zapis.f7.html';
import Auth from '../pages/auth.f7.html';
import NotFoundPage from '../pages/404.f7.html';
import Newza from '../pages/newza.f7.html';
import Karta from '../pages/karta.f7.html';
import Addzapis from '../pages/addzapis.f7.html';
var routes = [
  {
    path: '/home/',
    component: HomePage,
  },
  {
    path: '/news/',
    component: News,
  },
  {
    path: '/add_news/',
    component: Add_news,
  },
  {
    path: '/edit_news/',
    component: Edit_news,
  },
  {
    path: '/dolg/',
    component: Dolg,
  },
  {
    path: '/moi/',
    component: Moi,
  },
  {
    path: '/otvet/',
    component: Otvet,
  },
  {
    path: '/info/',
    component: Info,
  },
  {
    path: '/add_info/',
    component: Add_info,
  },
  {
    path: '/edit_info/',
    component: Edit_info,
  },
  {
    path: '/notification/',
    component: Notification,
  },
  {
    path: '/add_notification/',
    component: Add_notification,
  },
  {
    path: '/edit_notification/',
    component: Edit_notification,
  },
  {
    path: '/kontakt/',
    component: Kontakt,
  },
  {
    path: '/ochered/',
    component: Ochered,
  },
  {
    path: '/ucher/',
    component: Ucher,
  },
  {
    path: '/opri/',
    component: Opri,
  },
  {
    path: '/teh/',
    component: Teh,
  },
  {
    path: '/proga/',
    component: Proga,
  },
  {
    path: '/add_proga/',
    component: Add_proga,
  },
  {
    path: '/edit_proga/',
    component: Edit_proga,
  },
  {
    path: '/zapis/',
    component: Zapis,
  },
  {
    path: '/auth/',
    component: Auth,
  },
  {
    path: '/karta/',
    component: Karta,
  },
  {
    path: '/newza/',
    component: Newza,
  },
  {
    path: '/addzapis/',
    component: Addzapis,
  },
  {
    path: '(.*)',
    component: NotFoundPage,
  },
];

export default routes;