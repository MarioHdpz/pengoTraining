define(
    ['jquery'], 
    function($)
{
    'use strict';    
    return function(componentToExtend){

        /* Aquí va nuestra lógica */

        var miCodigo = {
            miFuncion :function()
            {
                $('.input-text').val('hola crayola 2');
            }
        }

        return componentToExtend.extend(miCodigo);
    };
});