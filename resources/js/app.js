import './bootstrap';

import Alpine from 'alpinejs';

import $ from 'jquery'; // Import jQuery
import 'datatables.net'; // Import DataTables

// Your custom JS code
$(document).ready(function() {
    $('#productTable').DataTable(); // Initialize DataTable
});


window.Alpine = Alpine;

Alpine.start();
