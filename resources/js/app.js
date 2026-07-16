import './bootstrap';
import 'bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import './bootstrap';

import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';

import jszip from 'jszip';
window.JSZip = jszip;

import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

pdfMake.vfs = pdfFonts.vfs;

import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-buttons';
import 'datatables.net-buttons-dt';

import 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-buttons/js/buttons.colVis';

import JSZip from 'jszip';
window.JSZip = JSZip;

import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';

pdfMake.vfs = pdfFonts.vfs;
window.pdfMake = pdfMake;