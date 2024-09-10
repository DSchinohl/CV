var noOccupied = 0;
var piece = " "    
var row = "[Event \"?\"]\n[Site \"chessPositionMaker\"]\n[Date \"????.??.??\"]\n[Round \"?\"]\n[White \"?\"]\n[Black \"?\"]\n[Result \"*\"]\n[SetUp \"1\"][FEN \"";
var tempRow = "\n\n";
const zArray = ["♟","♞","♝","♜","♛","♚","♙","♘","♗","♖","♕","♔"];
const yArray = ["a","b","c","d","e","f","g","h"];

function onLoad(){
    let x = 0;
    let colorIndicator = 1;
    for(i=1; i<=8;i++){
        document.getElementById("container").innerHTML += "<section class=\"container displayFlex\"></section>";
        for(j=1;j<=8;j++){
            if(colorIndicator%2 == 0){ color = "#3c3c3c";}
            else{ color = "white";}
            document.getElementsByClassName("container")[i-1].innerHTML += "<button class=\"square \" style=\"background-color:"+color+"\"; onclick=fillTheSquare(\""+x+"\")> </button>";
            x++;
            colorIndicator++;
        }
        colorIndicator++;
    }
    
    for(i = 0; i < 12; i++ ){
        document.getElementById("piecesBar").innerHTML += "<button onclick='setter(\""+ zArray[i] + "\")' style=\"margin: 5px; font-size:40px;\">"+zArray[i]+"</button>";
    }
}

function setter(entered){
    piece = entered
}

function fillTheSquare(squareID){
    document.getElementsByClassName("square")[squareID].innerHTML = piece
}

function onPrint(){
    for(i=0; i<8; i++){
        elements = document.getElementsByClassName("container")[i].textContent
        
        var noOccupied = 0;
        for(j=0; j<8;j++){
            tempPiece = "";
            switch(elements[j]){
                case "♟":
                    tempPiece = "p";
                    break;
                case "♞":
                    tempPiece = "n";
                    break;
                case "♝":
                    tempPiece = "b";
                    break;
                case "♜":
                    tempPiece = "r";
                    break;
                case "♛":
                    tempPiece = "q";
                    break;
                case "♚":
                    tempPiece = "k";
                        break;

                case "♙":
                    tempPiece = "P";
                    break;
                case "♘":
                    tempPiece = "N";
                    break;
                case "♗":
                    tempPiece = "B";
                    break;
                case "♖":
                    tempPiece = "R";
                    break;
                case "♕":
                    tempPiece = "Q";
                    break;
                case "♔":
                    tempPiece = "K";
                    break;
            }
            

            if(elements[j] == " "){
                noOccupied++;
            }else if(elements[j] != " "){
                if(noOccupied != 0){
                    row += noOccupied.toString();
                }
                noOccupied = 0;
                row += tempPiece;
            }if(j == 7 && noOccupied != 0){
                row += noOccupied+"/";
            }else if(j == 7){
                row += "/";
            }
            
            if(elements[j] != " "){
                tempRow += elements[j]+" "+yArray[j]+""+(i+1)+", ";
            }
            
        }
    }
    row = row.substring(0, row.length - 1);
    row += " w - - 0 1\"]";
    console.log(row,tempRow)
}
    