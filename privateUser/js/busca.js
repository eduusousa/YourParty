
$(document).ready(() => {

    

    filter_data_buffet();
    filter_data_decoracao();
    filter_data_local();
    filter_data_seguranca();



    // ------------------------   PESQUISA  --------------------------------\\
   
    
    $('#search').keyup( async (e) => {
        e.preventDefault()

        $.post('./controller/busca.php', { busca: $('#pesquisa').val() }, function (data) {
            $('.pro-container').html(data);
        })

    })

    




    // ------------------------   FILTRO BUFFET  --------------------------------\\
    function filter_data_buffet() {
        $('.pro-container').html('<div id="loading" style="" ></div>');

        let action = './controller/fetch_data_buffet';

        let minimum_price = $('#hidden_minimum_price').val();
        let maximum_price = $('#hidden_maximum_price').val();

        let servico = get_filter('servico');
        let cidade = get_filter('cidade');
        let estado = get_filter('estado');

        $.ajax({

            url: "./controller/fetch_data_buffet.php",
            method: "POST",
            data: {
                action: action,

                minimum_price: minimum_price,
                maximum_price: maximum_price,

                servico: servico,
                cidade: cidade,
                estado: estado,
            },
            success: function (data) {
                $('.pro-container').html(data);
            }

        });

    }



    // ------------------------  FILTRO DECORAÇÃO  --------------------------------\\
    function filter_data_decoracao() {
        $('.pro-container').html('<div id="loading" style="" ></div>');
        let action = './controller/fetch_data_decoracao';

        let minimum_price = $('#hidden_minimum_price').val();
        let maximum_price = $('#hidden_maximum_price').val();

        let servico = get_filter('servico');
        let cidade = get_filter('cidade');
        let estado = get_filter('estado');

        $.ajax({

            url: "./controller/fetch_data_decoracao.php",
            method: "POST",
            data: {
                action: action,

                minimum_price: minimum_price,
                maximum_price: maximum_price,

                servico: servico,
                cidade: cidade,
                estado: estado,
            },
            success: function (data) {
                $('.pro-container').append(data);
            }

        });

    }


    // ------------------------  FILTRO LOCAL  --------------------------------\\
    function filter_data_local() {
        $('.pro-container').html('<div id="loading" style="" ></div>');
        let action = './controller/fetch_data_local';

        let minimum_price = $('#hidden_minimum_price').val();
        let maximum_price = $('#hidden_maximum_price').val();

        let servico = get_filter('servico');
        let cidade = get_filter('cidade');
        let estado = get_filter('estado');

        let cidadeSalao = get_filter('cidadeSalao');
        let estadoSalao = get_filter('estadoSalao');

        $.ajax({

            url: "./controller/fetch_data_local.php",
            method: "POST",
            data: {
                action: action,

                minimum_price: minimum_price,
                maximum_price: maximum_price,

                servico: servico,
                cidade: cidade,
                estado: estado,

                cidadeSalao: cidadeSalao,
                estadoSalao: estadoSalao
                
            },
            success: function (data) {
                $('.pro-container').append(data);
            }

        });

    }


    // ------------------------  FILTRO SEGURANÇA  --------------------------------\\
    function filter_data_seguranca() {
        $('.pro-container').html('<div id="loading" style="" ></div>');
        let action = './controller/fetch_data_seguranca';

        let minimum_price = $('#hidden_minimum_price').val();
        let maximum_price = $('#hidden_maximum_price').val();

        let servico = get_filter('servico');
        let cidade = get_filter('cidade');
        let estado = get_filter('estado');

        $.ajax({

            url: "./controller/fetch_data_seguranca.php",
            method: "POST",
            data: {
                action: action,

                minimum_price: minimum_price,
                maximum_price: maximum_price,

                servico: servico,
                cidade: cidade,
                estado: estado,
            },
            success: function (data) {
                $('.pro-container').append(data);
            }

        });

    }



    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }



    $('.common_selector').click(function () {
        filter_data_buffet();
        filter_data_decoracao();
        filter_data_local();
        filter_data_seguranca();
    });



    $('#price_range').slider({
        range: true,
        min: 10,
        max: 10000,
        values: [10, 10000],
        step: 10,
        stop: function (event, ui) {

            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);

            filter_data_buffet();
            filter_data_decoracao();
            filter_data_local();
            filter_data_seguranca();
        }
    });

})