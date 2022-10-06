pragma solidity ^0.8.10;
 
contract Estudiante{

    string private _nombre;
    string private _DNI; 
    string private _Credencial; 
    address private _medico;
    string private _apellido;
    string private _medicamento;
    uint256 private _tiempoMandado;
    string private _aclaracion;
    string private _cantidad;
    //string[] private _cantidad;
    //mapping(string => uint) private _cantidadMedicamentos;
    //bytes32 _cantidad;
    

    constructor(string memory nombre_, string memory apellido_, string memory DNI_, string memory Credencial_){
        _medico = msg.sender;
        _Credencial = Credencial_;
        _DNI = DNI_;
        string memory nom = string(abi.encodePacked(nombre_));
        _nombre = nom;
        _apellido = apellido_;
    }


   
     function set_CantidadMedicamentos(string memory medicamento, string memory cantidad, string memory aclaracion) public{
         require(msg.sender == _medico, "Solo el medico puede asignar medicamentos");
         _aclaracion = aclaracion;
         _cantidad = cantidad;
        
         _medicamento = medicamento;
        _tiempoMandado = block.timestamp;
     }
/*
    function Ver_apellido() public view returns (string memory){return _apellido; } 
    function Ver_nombre_() public view returns (string memory){return _nombre;}
    function Ver_Credencial() public view returns (string memory){return _Credencial;}
    function Ver_DNI() public view returns (string memory){ return _DNI;} function Ver_medicamento() public view returns (string memory){ return _medicamento;
    function CantMeds() public view returns (uint){return _cantidadMedicamentos[_medicamento];}
*/   
     
    event Transfer(address _medico, address paciente, uint cantidadMedicamentos, string aclaracion, uint256 timestamp, string keyword);
 
    function concatenate() public view returns (string memory) {
        
    return string(bytes.concat( 
    '  Apellido:  ', bytes(_apellido),
    '  Nombre:  ', bytes(_nombre), 
    ' Credencial: ', bytes(_Credencial),
    '  DNI: ',bytes(_DNI),
    ' Cantidad: ', bytes(_cantidad),
    '  Medicamento: ', bytes(_medicamento),
    ' Aclaracion: ', bytes(_aclaracion),' '));

}
    
  }
//bytes(_tiempoMandado)
 
 
 
//     function addToBlockchain(address payable receiver, uint cantidadMedicamentos, string memory aclaracion, string memory keyword) public {
//         //transactionCount += 1;
//         transactions.push(TransferStruct(msg.sender, receiver, cantidadMedicamentos, aclaracion, block.timestamp, keyword));
 
//         emit Transfer(msg.sender, receiver, cantidadMedicamentos, aclaracion, block.timestamp, keyword);
//     }
 
//     function getAllTransactions() public view returns (TransferStruct[] memory) {
//         return transactions;
//     }
 
   
 