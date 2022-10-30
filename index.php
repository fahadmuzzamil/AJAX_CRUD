<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>AJAX_CRUD</title>
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    /* padding: 10px; */
    background-color: grey;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    position: relative;
}
.container{
    border: 5px solid rgb(23, 23, 23);
    border-radius: 10px;
    box-shadow: 0 0 10px black;
    background-color: rgb(218, 218, 218);
    min-height: 650px;
    min-width: 60%;
}
header{
    min-height: 60px;
    padding: 10px;
    background-color: rgb(238, 95, 43);
    color: white;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-evenly;
    border-radius: 6px 6px 0 0;
}
label{
    /* color: black; */
    text-shadow: 0px 0px 10px black;
    font-weight: 700;
    font-family: cursive;
    font-size: 22px;
}
input{
    height: 30px;
    border-radius: 5px;
    border: none;
    outline: none;
    padding: 0 5px;
    font-weight: bold;
    background-color: rgb(193, 209, 241);
    /* caret-color: transparent; */
    cursor: pointer;
}
.name-field-div{
    min-height: 60px;
    padding: 10px;
    background-color: rgb(10, 162, 5);
    color: white;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-evenly;
    gap: 5px;
}
.name-field{
    display: flex;
    align-items: center;
    gap: 20px;
}
.fname-div, .lname-div{
    display: flex;
    align-items: center;
    gap: 5px;
}
#save-btn{
    background-color: yellow;
    width: 70px;
    height: 27px;
    border: none;
    border-radius: 5px;
    outline: none;
    font-weight: 700;
    font-family: cursive;
    box-shadow: 0 0 5px black;
    cursor: pointer;
    font-size: 18px;
    letter-spacing: 1px;
    margin-left: 15px;
    transition: all 0.2s;
}
#save-btn:hover{
    transition: all 0.2s;
    background-color: rgb(121, 73, 10);
    color: white;
}
main{
    padding: 10px;
}
.table-div{
    min-height: 470px;
    border: 4px solid black;
    background-color: #a99877;
    padding: 5px;

}
.table-div table{
    width: 100%;
    height: 100%;
    text-align: center;
}
.table-div table .heading{
    background: blue;
    height: 50px;
    color: white;
    font-weight: bold;
    margin-bottom: 5px
}
.summary{
    font-weight: bold;
    background: #297a70;
    height: 35px;
    color: white;
}
.summary:nth-child(even){
    background: wheat;
    color: black;
}


.delete-btn, .update-button{
    padding: 3px 10px;
    outline: none;
    border: none;
    color: white;
    font-weight: bold;
    background: #965454;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    transition: all 0.3s;
}
.update-button{
    background: #1d581d;
}
.delete-btn:hover{
    background: red;
    transition: all 0.3s;
}
.update-button:hover{
    background: green;
    transition: all 0.3s;
}

/* <!-- //Update Portion CSS--> */
.update-div{
    visibility: hidden;
    width: 100%;
    height: 100vh;
    position: absolute;
    top: 0;
    left: 0;
    visibility: hidden;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0,0,0,.5);

}
.inner-update-div{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    width: 250px;
    height: 250px;
    background-color: black;
    padding: 20px;
    border-radius: 25px;
}
.inner-update-div table{
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: column;
    gap: 10px;
}
.close{
    position: absolute;
    color: white;
    width: 30px;
    height: 30px;
    background-color: red; 
    top: -10px; 
    right: -10px;
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index:11000;
}
.lines{
    width: 70%;
    height: 3px;
    background-color: white;
}
.line-1{
    transform: rotate(45deg);
}
.line-2{
    transform: translateY(-3px) rotate(-45deg) ;
}

    </style>
</head>
<body>
    <div class = "container">
        <header>
            <div class="heading">
                <h1>PHP CRUD WITH AJAX</h1>
            </div>
        <div class="search-field">
            <label for="search">Search: </label>
           <input type="text" name="" id = "search">
        </div>

        </header>
        
        <div class = "name-field-div">
            <div class="name-field">
                <div class="fname-div">
                <label for="fname">First Name: </label>
                <input type="text" name="" id = "fname">
                </div>

                <div class="lname-div">
                <label for="lname">Last Name: </label>
                <input type="text" name="" id = "lname">
                </div>
            </div>
            <input type="submit" value="Save" id="save-btn">
        </div> 
        <main>
            <div class="table-div"></div>
        </main>
    </div>
    <!-- //Update Portion -->
    <div class="update-div">
        <div class="inner-update-div"> 
        <div class="close">
            <div class="line-1 lines"></div>
            <div class="line-2 lines"></div>
        </div>
        <table>

        </table>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $(document).ready(()=>{

            //DisplayDataing Data VIA AJAX
            function displayData(){
            $.ajax({
                url: "fetch-data.php",
                type: "POST",
                success: function(data){
                        $(".table-div").html(data);                   
                }
            })
         }
         displayData();

            //Inserting Data VIA AJAX
            $("#save-btn").on("click",()=>{    
                if($("#fname").val() === "" && $("#lname").val() === ""){
                    alert("Please fill both blanks");
                }else{
                 let fname = $("#fname").val();
                 let lname = $("#lname").val();
                  
                $.ajax({
                    url: "insert-data.php",
                    type: "POST",
                    data:{
                        fname: fname,
                        lname: lname,
                    },
                    success: function(data){
                        displayData();
                    }
                })
                }
               
            })

            //Deleting Data VIA AJAX
            $(document).on("click",".delete-btn",(e)=>{
                let id = $(e.target).attr("id");
                
                $.ajax({
                    url: "delete-data.php",
                    type: "POST",
                    data:{
                        id: id
                    },
                    success: function(data){
                        displayData();
                    }
                })
            })

            //Updating Data VIA AJAX
             $(document).on("click",".update-button",(e)=>{
                $(".update-div").css("visibility","visible");
                ///loading-data
                let id = $(e.target).attr("id");
                $.ajax({
                    url: "load-update-data.php",
                    type: "POST",
                    data:{
                        id: id,
                    },
                    success: function(data){
                        $(".inner-update-div table").html(data);
                    } 
                })

                //Updating-data
                $(document).on("click",".updated-btn",(e)=>{
                $(".update-div").css("visibility","hidden");
                    let id = $(e.target).attr("id");
                    let fname = $("#updated-fname").val();
                    let lname = $("#updated-lname").val();

                    $.ajax({
                        url: "update-data.php",
                        type: "POST",
                        data:{
                            fname: fname,
                            lname: lname,
                            id: id
                        },
                        success: function(data){
                            displayData();
                        }

                    })
                })
                //Closing update-box with close-btn
                $(document).on("click",".close", ()=>{
                $(".update-div").css("visibility","hidden");
                })
             })

             //Live-Search With AJAX
             $("#search").on("keyup",()=>{
                let search_value = $("#search").val();
                $.ajax({
                    url: "live-search.php",
                    type: "POST",
                    data:{
                        search: search_value,
                    },
                    success: function(data){
                        $(".table-div").html(data);
                    } 
                })
              })
                    
                })

    </script>
</body>
</html>