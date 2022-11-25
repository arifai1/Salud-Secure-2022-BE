const contract_abi2 = [
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": false,
				"internalType": "address",
				"name": "idP",
				"type": "address"
			},
			{
				"indexed": false,
				"internalType": "string",
				"name": "nombre",
				"type": "string"
			},
			{
				"indexed": false,
				"internalType": "string",
				"name": "apellido",
				"type": "string"
			},
			{
				"indexed": false,
				"internalType": "string",
				"name": "DNI",
				"type": "string"
			}
		],
		"name": "NewPaciente",
		"type": "event"
	},
	{
		"anonymous": false,
		"inputs": [
			{
				"indexed": false,
				"internalType": "uint256",
				"name": "IdR",
				"type": "uint256"
			},
			{
				"indexed": false,
				"internalType": "address",
				"name": "idP",
				"type": "address"
			},
			{
				"indexed": false,
				"internalType": "address",
				"name": "idM",
				"type": "address"
			},
			{
				"indexed": false,
				"internalType": "string",
				"name": "medicamento",
				"type": "string"
			},
			{
				"indexed": false,
				"internalType": "string",
				"name": "aclaracion",
				"type": "string"
			}
		],
		"name": "NewReceta",
		"type": "event"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_nombreApellido",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_especializacion",
				"type": "string"
			}
		],
		"name": "set_Medico",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_nombre",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_apellido",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_DNI",
				"type": "string"
			}
		],
		"name": "set_Paciente",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_dniPaciente",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_medicamento",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_aclaracion",
				"type": "string"
			}
		],
		"name": "set_receta",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "getReceta",
		"outputs": [
			{
				"components": [
					{
						"internalType": "uint256",
						"name": "idR",
						"type": "uint256"
					},
					{
						"internalType": "address",
						"name": "idP",
						"type": "address"
					},
					{
						"internalType": "string",
						"name": "nomApeM",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "medicamento",
						"type": "string"
					},
					{
						"internalType": "string",
						"name": "aclaracion",
						"type": "string"
					}
				],
				"internalType": "struct saludSecure.Receta[]",
				"name": "",
				"type": "tuple[]"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"name": "idPaciente",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			}
		],
		"name": "medico",
		"outputs": [
			{
				"internalType": "bool",
				"name": "",
				"type": "bool"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "nomMedico",
		"outputs": [
			{
				"internalType": "string",
				"name": "",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "address",
				"name": "",
				"type": "address"
			},
			{
				"internalType": "uint256",
				"name": "",
				"type": "uint256"
			}
		],
		"name": "recetaA",
		"outputs": [
			{
				"internalType": "uint256",
				"name": "idR",
				"type": "uint256"
			},
			{
				"internalType": "address",
				"name": "idP",
				"type": "address"
			},
			{
				"internalType": "string",
				"name": "nomApeM",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "medicamento",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "aclaracion",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
]