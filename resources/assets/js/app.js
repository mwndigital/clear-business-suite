require('bootstrap');

$(document).ready(function(){
    //Sidebar Toggler
    $('.sidebar-toggler').click(function(){
        $(this).find('i').toggleClass('fa-bars fa-times');
        $('.sidebar').toggleClass('show');
        $('main.main').toggleClass('full');
    });

    $('.dataTablesTable').DataTable();
})
