/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cambiarFuncion(funcion){
    localStorage.setItem("funcion", funcion);
}
function obtenerFuncion(){
    localStorage.getItem("funcion");
    
}

function recarga(){
    
    function checkKeyCode(evt)
    {

        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if(event.keyCode==116)
        {
            evt.keyCode=0;
            return false
        }
        }
        document.onkeydown=checkKeyCode;
    }


