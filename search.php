<?php
$connection = mysqli_connect("localhost:4306", "root", "abcd", "library");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <link rel="stylesheet" href="search.css">
    <style>

    </style>
</head>
<body>
    <div class="nav">
        <p id="dept">DEPARTMENT OF CSE</p>
        <div><a href="home.php">Home</a></div>
        <div><a href="index.php">Admin</a></div>
    </div>
    <div class="header">
        <p>COLLECTIONS</p>
    </div>
    <div class="Container">
        <div class="search">
            <div class="search-header">
                <h2>Search Books</h2>
                <hr style="margin:15px 15px 60px 15px; border:1px solid grey">
            </div>
            <div class="search-body">
                <div class="searchbar">
                    <input type="text" placeholder="By Book Name . . . " name="searchbar"
                    id="searchbar1">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="searchbar">
                    <input type="text" placeholder="By Book ID . . . " name="searchbar"
                    id="searchbar2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="searchbar">
                    <input type="text" placeholder="By Author Name . . . " name="searchbar"
                    id="searchbar3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="search-footer">
                <hr style="margin: 15px; border: 1px solid grey;">
                <div class="quote">
                    <h3>Books means K
                        nowledge</h3>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content-body">
                <div class="root">
                    <table class="table">
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <div class="footer">
        <p><i class="fa-regular fa-copyright"></i>
            Copyrights by &nbsp; <span>Ajmal, Antony, Dravid, Hanush</span></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">   

    $(document).ready(function(){
    $.ajax({
        url : 'main.php',
        type : 'GET',
        dataType : 'json',
        success:function(data)
        {
            console.log(data);
            var htmlappend = ""+
            "'<tr><td>S.NO</td>'"+
                "'<td>ACCESS NO</td><td>TITLE</td><td>AUTHOR</td><td>AVAILABILITY</td></tr>'";
            $.each(data,function(index,item){
            htmlappend += 
            '<tr><td>'+ item.sno + 
                '</td><td>'+ item.access_no +
                    '</td><td>'+ item.title + 
                        '</td><td>'+ item.author +
                        '</td><td>'+ item.Availability +  
                    '</td></tr>';
            });
            // console.log(htmlappend);
            $(".table").html(htmlappend);
            // const categories = [...new Set(data.map((item)=> {return item}))];
            
            const sb1 = document.getElementById('searchbar1');
            sb1.addEventListener('keyup',(e) => {
                const searchdata = e.target.value.toLowerCase();
                const filterdata = data.filter((item)=>{
                    return(
                        item.title.toLocaleLowerCase().includes(searchdata)
                    )
                }) 
                var htmlappend2 = ""+
                    "'<tr><td>S.NO</td>'"+
                    "'<td>ACCESS NO</td><td>TITLE</td><td>AUTHOR</td><td>AVAILABILITY</td></tr>'";
                $.each(filterdata,function(index,val){
                    htmlappend2 += 
                    '<tr><td>'+ val.sno + 
                    '</td><td>'+ val.access_no +
                    '</td><td>'+ val.title + 
                        '</td><td>'+ val.author +
                        '</td><td>'+ val.Availability +  
                    '</td></tr>';
                });
                $(".table").html(htmlappend2);
            })

            const sb2 = document.getElementById('searchbar2');
            sb2.addEventListener('keyup',(e) => {
                const searchdata = e.target.value.toLowerCase();
                const filterdata = data.filter((item)=>{
                    return(
                        item.access_no.toLocaleLowerCase().includes(searchdata)
                    )
                }) 
                var htmlappend3 = ""+
                    "'<tr><td>S.NO</td>'"+
                    "'<td>ACCESS NO</td><td>TITLE</td><td>AUTHOR</td><td>AVAILABILITY</td></tr>'";
                $.each(filterdata,function(index,val){
                    htmlappend3 += 
                    '<tr><td>'+ val.sno + 
                    '</td><td>'+ val.access_no +
                    '</td><td>'+ val.title + 
                        '</td><td>'+ val.author + 
                        '</td><td>'+ val.Availability + 
                    '</td></tr>';
                });
                $(".table").html(htmlappend3);
            })

            const sb3 = document.getElementById('searchbar3');
            sb3.addEventListener('keyup',(e) => {
                const searchdata = e.target.value.toLowerCase();
                const filterdata = data.filter((item)=>{
                    return(
                        item.author.toLocaleLowerCase().includes(searchdata)
                    )
                }) 
                var htmlappend4 = ""+
                    "'<tr><td>S.NO</td>'"+
                    "'<td>ACCESS NO</td><td>TITLE</td><td>AUTHOR</td><td>AVAILABILITY</td></tr>'";
                $.each(filterdata,function(index,val){
                    htmlappend4 += 
                    '<tr><td>'+ val.sno + 
                    '</td><td>'+ val.access_no +
                    '</td><td>'+ val.title + 
                        '</td><td>'+ val.author +
                        '</td><td>'+ val.Availability +  
                    '</td></tr>';
                });
                $(".table").html(htmlappend4);
            })
            
        }
    })
});

    </script>
</body>
</html>