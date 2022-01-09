/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Editor from '@toast-ui/editor'
import 'codemirror/lib/codemirror.css'
import '@toast-ui/editor/dist/toastui-editor.css';
require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '400px',
  initialEditType: 'markdown',
  placeholder: 'Write something cool!',
})

if (document.querySelector('#createPostForm')) {
    document.querySelector('#createPostForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#isi').value = editor.getMarkdown();
        e.target.submit();
    });
}

if (document.querySelector('#editPostForm')) {
    editor.setMarkdown(document.querySelector('#oldContent').value);

    document.querySelector('#editPostForm').addEventListener('submit', e => {
        e.preventDefault();
        document.querySelector('#isi').value = editor.getMarkdown();
        e.target.submit();
    });
}
