import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

// fontawesome svg/js 5.0.8
import fontawesome from '@fortawesome/fontawesome';
// plucked 'brands' icons
import faFacebookSquare from '@fortawesome/fontawesome-free-brands/faFacebookSquare';
import faWordpressSimple from '@fortawesome/fontawesome-free-brands/faWordpressSimple';
import faGithub from '@fortawesome/fontawesome-free-brands/faGithub';
//import faFlickr from '@fortawesome/fontawesome-free-brands/faFlickr';
import faLinkedin from '@fortawesome/fontawesome-free-brands/faLinkedin';
//import faInstagram from '@fortawesome/fontawesome-free-brands/faInstagram';
//import faStrava from '@fortawesome/fontawesome-free-brands/faStrava';
// plucked 'solid' icons
import faSearch from '@fortawesome/fontawesome-free-solid/faSearch';
import faCode from '@fortawesome/fontawesome-free-solid/faCode';
 fontawesome.library.add(faFacebookSquare, faWordpressSimple, faGithub,
                        faLinkedin, faSearch, faCode);

$(document).foundation();
