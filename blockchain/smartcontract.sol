// SPDX-License-Identifier: MIT
pragma solidity ^0.8.10;
 
contract saludSecure{
 
    address private _medico;  

    string private _nombre;
    string private _apellido;
    string private _DNI;

    string  _medicamento;
    uint256  _tiempoMandado;
    string  _aclaracion;
    string  _cantidad;
   
    constructor (string memory nombre_, string memory apellido_, string memory DNI_ ){
        _nombre = nombre_;
        _apellido = apellido_;
        _DNI = DNI_;
        _medico = msg.sender;
    }
     function set_receta(string memory medicamento_, string memory cantidad_, string memory aclaracion_) public{
         require(msg.sender == _medico, "Solo el medico puede asignar medicamentos");
         _aclaracion = aclaracion_;
         _cantidad = cantidad_;
         _medicamento = medicamento_;
     }
    function ver_Receta() public view returns (string memory){
       
     return string(bytes.concat(
     ' Apellido: ', bytes(_apellido),
     '  Nombre:  ', bytes(_nombre),
     '  DNI: ',bytes(_DNI),
     ' Cantidad: ', bytes(_cantidad),
     '  Medicamento: ', bytes(_medicamento),
     ' Aclaracion: ', bytes(_aclaracion),' '));
     }
}