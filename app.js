// ABI and contract address from Remix IDE

var contractAbi = [
		{
			"anonymous": false,
			"inputs": [
				{
					"indexed": false,
					"internalType": "uint256",
					"name": "index",
					"type": "uint256"
				}
			],
			"name": "Added",
			"type": "event"
		},
		{
			"inputs": [
				{
					"internalType": "uint256",
					"name": "_productId",
					"type": "uint256"
				},
				{
					"internalType": "string",
					"name": "info",
					"type": "string"
				}
			],
			"name": "addState",
			"outputs": [
				{
					"internalType": "string",
					"name": "",
					"type": "string"
				}
			],
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"inputs": [
				{
					"internalType": "string",
					"name": "_a",
					"type": "string"
				},
				{
					"internalType": "string",
					"name": "_b",
					"type": "string"
				}
			],
			"name": "concat",
			"outputs": [
				{
					"internalType": "string",
					"name": "",
					"type": "string"
				}
			],
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"inputs": [
				{
					"internalType": "string",
					"name": "_text",
					"type": "string"
				},
				{
					"internalType": "string",
					"name": "_date",
					"type": "string"
				}
			],
			"name": "newItem",
			"outputs": [
				{
					"internalType": "bool",
					"name": "",
					"type": "bool"
				}
			],
			"stateMutability": "nonpayable",
			"type": "function"
		},
		{
			"inputs": [
				{
					"internalType": "uint256",
					"name": "_productId",
					"type": "uint256"
				}
			],
			"name": "searchProduct",
			"outputs": [
				{
					"internalType": "string",
					"name": "",
					"type": "string"
				}
			],
			"stateMutability": "nonpayable",
			"type": "function"
		}
]; 

// Contract Address from Remix IDE
var contractAddress ='0x1f4f97b14770f1AE99BB3EE3F7504809C3113b4A'; 
