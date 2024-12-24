import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import './bootstrap';
import Alpine from 'alpinejs';

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });


window.Alpine = Alpine;

Alpine.start();
