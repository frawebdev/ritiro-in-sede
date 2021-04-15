jQuery(document).ready(function( $ ) {

    $("#billing_check_ris").prop('checked', false); 

    $('#billing_check_ris').change( 
        function(){
            if($('#billing_check_ris').is(':checked')){
            $('#billing_choose_ris_field').show()
            $('.payment_method_cod').show()
            $('.payment_method_cod').prop('checked', true)
            $('.payment_method_bacs').hide()
            $('.payment_method_bacs').prop('checked', false)
            $('.payment_method_paypal').hide()
            $('.payment_method_paypal').prop('checked', false)
        } else {
            $('#billing_choose_ris_field').hide()
            $('.payment_method_cod').hide()
            $('.payment_method_cod').prop('checked', false)
            $('.payment_method_bacs').show()
            $('.payment_method_paypal').show()
            $('#billing_choose_ris').val(0)
        }
    }
    )

    $('#billing_state').change(
        function(){

            $("#billing_check_ris").prop('checked', false);
            $('#billing_choose_ris').val(0)

            switch($('#billing_state').val()){

                case 'MI':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Milano")').show()
                break;

                case 'TO':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Torino")').show()
                break;

                case 'VE':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Chioggia")').show()
                break;

                /*case 'BG':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Bergamo")').show()
                break;*/

                case 'GE':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Genova")').show()
                break;

                case 'BO':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Bologna")').show()
                break;

                case 'RN':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Riccione")').show()
                break;

                case 'PD':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Padova")').show()
                break;

                case 'VR':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Verona")').show()
                break;

                case 'PR':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Parma")').show()
                break;

                case 'BS':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Brescia")').show()
                break;

                case 'RM':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Roma")').show()
                    $('#billing_choose_ris option:contains("Tivoli")').show()
                break;

                case 'FI':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Firenze")').show()
                break;

                case 'PE':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Pescara")').show()
                break;

                case 'CA':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Cagliari")').show()
                break;

                case 'NA':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Napoli")').show()
                break;

                case 'BA':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Bari")').show()
                break;

                /*case 'SA':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Salerno")').show()
                break;

                case 'PA':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Palermo")').show()
                break;

                case 'CT':
                    $('#billing_check_ris_field').show()
                    $('#billing_choose_ris option').hide()
                    $('#billing_choose_ris option:contains("Catania")').show()
                break;*/

                default:
                $('#billing_choose_ris option').show()
                $('#billing_choose_ris_field').hide()
                $("#billing_check_ris").prop('checked', false);
                    
            }
        }
    )

});