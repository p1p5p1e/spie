import './bootstrap';

import Alpine from 'alpinejs';

import * as ToastComponent from '../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts';

Alpine.data('ToastComponent', ToastComponent)

window.Alpine = Alpine;

Alpine.start();

import jquery from "jquery";

window.jquery = jquery;

import "./util/showhart"