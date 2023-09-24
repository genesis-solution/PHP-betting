let gameHistoryTable = document.getElementById("game_history_table");
const gameHistory = () => {
  const res = APIRequest(
    "php-includes/api/api_game_history.php",
    "GET",
    {
      gameHistory: "jueteng_gameHistory",
    }
  );

  res.then(function (response) {
    const res = JSON.parse(response);
    // console.log(res);
    
    if(res.error !== 'no_record_found') {
      $('#gh_tbl_msg').removeClass('table_message_show');
      $('#gh_tbl_msg').addClass('table_message_hide');      
      
      $("#game_history_table tr").remove();

      let row1 = gameHistoryTable.insertRow(0);
      let row2 = gameHistoryTable.insertRow(1);
      
      for (let i = 0; i < res.data.length; i++) {
        let formatDate = new Date(res.data[i].date_declared);
        let newDate = `${formatDate.getMonth() + 1}-${formatDate.getDate()}-${formatDate.getFullYear()}`;
        
        let splitResult = res.data[i].combinations.split('-');
  
        let cell1 = row1.insertCell(i);
        let cell2 = row2.insertCell(i);
        let gameTime = "";

        if (res.data[i].draw_time === 'D1') { 
          gameTime = `<p style='margin:0;'> Draw 1 (L) </p>`;
        } else if (res.data[i].draw_time === 'D2') {
            gameTime = `<p style='margin:0;'> Draw 1 (N) </p>`;
        } else if (res.data[i].draw_time === 'D3') {
            gameTime = `<p style='margin:0;'> Draw 2 (L) </p>`;
        } else if (res.data[i].draw_time === 'D4') {
            gameTime = `<p style='margin:0;'> Draw 2 (N) </p>`;
        } else if (res.data[i].draw_time === 'D5') {
            gameTime = `<p style='margin:0;'> Draw 3 (L) </p>`;
        } else if (res.data[i].draw_time === 'D6') {
            gameTime = `<p style='margin:0;'> Draw 3 (N) </p>`;
        }


        cell1.innerHTML = `
          <div class="table-header"> 
            ${newDate}
            ${gameTime}
          </div>`;

        cell2.innerHTML = `
          <div class='d-flex justify-content-center align-items-center'>
            <span class='ball ball_color1'> ${splitResult[0]} </span> - 
            <span class='ball ball_color2'> ${splitResult[1]} </span> - 
            <span class='ball ball_color3'> ${splitResult[2]} </span>
          </div>`;
      }
    } else {
      gameHistoryTable.innerHTML = "";
      $('#gh_tbl_msg').removeClass('table_message_hide');
      $('#gh_tbl_msg').addClass('table_message_show');   
    }

  });
}
