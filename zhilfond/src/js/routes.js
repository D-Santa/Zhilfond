
import HomePage from '../pages/home.f7.html';
import otv_och from '../pages/otv_och.f7.html';
import otv_otkaz from '../pages/otv_otkaz.f7.html';
import otv_dolg from '../pages/otv_dolg.f7.html';
import elek from '../pages/elek.f7.html';
import zapis from '../pages/zapis.f7.html';
import dolg from '../pages/dolg.f7.html';
import news from '../pages/news.f7.html';
import setting from '../pages/setting.f7.html';
import AboutPage from '../pages/about.f7.html';
import FormPage from '../pages/form.f7.html';
import opri from '../pages/opri.f7.html';
import teh from '../pages/teh.f7.html';
import OcheredPage from '../pages/ochered.f7.html';
import Setting_notifi from '../pages/setting_notifi.f7.html';
import Auth from '../pages/auth.f7.html';
import Pass from '../pages/pass.f7.html';
import Tel from '../pages/tel.f7.html';
import Pervi from '../pages/pervi.f7.html';
import Lich from '../pages/lich.f7.html';
import Moi from '../pages/moi.f7.html';
import Moi_zap from '../pages/moi_zap.f7.html';
import Otvet from '../pages/otvet.f7.html';
import Ucher from '../pages/ucher.f7.html';
import O_nas from '../pages/o_nas.f7.html';
import Welcome from '../pages/welcome.f7.html';
import Proga from '../pages/proga.f7.html';
import Newza from '../pages/newza.f7.html';
import Freim from '../pages/freim.f7.html';
var routes = [
{
    path: '/otvet/',
    component: Otvet,
  },
{
    path: '/moi/',
    component: Moi,
  },
  {
    path: '/moi_zap/',
    component: Moi_zap,
  },
{
    path: '/lich/',
    component: Lich,
  },
{
    path: '/pass/',
    component: Pass,
  },
  {
    path: '/tel/',
    component: Tel,
  },
  {
    path: '/pervi/',
    component: Pervi,
  },
{
    path: '/auth/',
    component: Auth,
  },
	{
    path: '/setting_notifi/',
    component: Setting_notifi,
  },
 {
    path: '/otv_och/',
    component: otv_och,
  },
  {
    path: '/otv_otkaz/',
    component: otv_otkaz,
  },
   {
    path: '/news/',
    component: news,
  },
  {
    path: '/setting/',
    component: setting,
  },
  {
    path: '/opri/',
    component: opri,
  },
  {
    path: '/teh/',
    component: teh,
  },
  {
    path: '/zapis/',
    component: zapis,
  },
  {
    path: '/elek/',
    component: elek,
  },
  {
    path: '/otv_dolg/',
    component: otv_dolg,
  },
  {
    path: '/dolg/',
    component: dolg,
  },
  {
    path: '/',
    component: HomePage,
  },
  {
    path: '/about/',
    component: AboutPage,
  },
  {
    path: '/form/',
    component: FormPage,
  },
   {
    path: '/ochered/',
    component: OcheredPage,
  },
  {
    path: '/ucher/',
    component: Ucher,
  },
  {
    path: '/o_nas/',
    component: O_nas,
  },
  {
    path: '/welcome/',
    component: Welcome,
  },
  {
    path: '/proga/',
    component: Proga,
  },
  {
    path: '/newza/',
    component: Newza,
  },
  {
    path: '/freim/',
    component: Freim,
  },
];

export default routes;