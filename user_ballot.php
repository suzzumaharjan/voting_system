<?php 

 
 include 'navbar2.php';
  
  if($_GET){
    $provision = $_GET['provision'];
  } 
  include 'fetching.php';
  include 'fetching1.php'; 
//connection close mysqli_close($conn); 
?>
 <!DOCTYPE html> 
 <html> 
     <head>
          <meta name="viewport" content="width=device-width, initial-scale=1"> 
          <!-- <link rel="stylesheet" type="text/css" href="style2.css"> -->
         <link rel="stylesheet" type="text/css" href="style4.css">
          
         <script src="https://kit.fontawesome.com/0acf56a1e1.js" crossorigin="anonymous"></script>
         
         
     </head> 
     <body>
    
      <div class="tbl2">
            <div class="para">
              <h2>Government of Nepal<br>
                  General Election<br/>
                For:Provision  <?=$provision?></h2>
            </div>
            <table  class="tbl3">
                <tr>
                    <th>S.No.</th>
                    <th>Party_Name</th>
                    <th>Candidate_name</th>
                    <th>Position_Name</th>
                    
                    <th>Vote status</th>
                </tr>
                <?php foreach($ballots as $index =>$ballot){ ?>
                <tr >
                    <td data-label="S.No."><?=$index + 1?></td>
                    <td data-label="Party_id"><?=$pp[$index][0]?></td>
                    <td data-label="Candidate_name"><?=$ballot['candidate_name']?></td>
                    <td><?=$pp[$index][1]?></td>
                    
                    <td ><a href="voter_search.php?pid='<?=$ballot['party_id']?>'&posid='<?=$ballot['position_id']?>'&cname='<?=$ballot['candidate_name']?>'&provision='<?=$provision?>'">Vote</a></td>
                   
                </tr>
                <?php } ?>
          </table>
          <div class="para">
              <h2>Remember: One people is allow to give vote <br>
              to only one candidate..</h2>
            </div>
      </div>
        <div class="foot">
          <footer>copyright@2021 hamrovote</footer>
                    
                  </div>
      
    </body>

      <style>
        
        /*#myform
        {
         margin-left: 720px;
         margin-top: 100px;
         

        
         
        }
        #myform h1
        {
          text-align: center;
          font-weight: bold;
          font-family: sans-serif;
        } 
        #myform h2
        {
          font-size: 20px;
          font-weight: bold;
          font-family: sans-serif;
          margin-left:  13px;
         
        
        }
       input 
        {
          width: 300px;
          height: 40px;
          margin-top : -140px;
          margin-left: 40px;
          font-size: 25px;
          border: 3px solid black;
          border-radius: 44px;
          text-align: center;
          
          
        }
        select
        {
          width: 298px;
          font-size: 25px;
          margin-top: -1000px;
          margin-left: 40px;
          text-align-last: center;

        }
        option
        {
          font-size: 25px;
          direction: ;
        }
        input:hover
        {
          border-color: #ffc400ec; 
        }
        #sub
        {
          margin-top: 30px;
          margin-left: 100px;
          width: 140px;
          height: 50px;
          font-weight: bold;
          font-size: 22px;
          color: black;
          border: 3px solid black ;
          border-radius: 40px;
       
        }
        #sub:hover
        {
          background-color: #ffc400ec;
        }*/
        
        
      </style>

</html>
