let transHistoryTable = document.getElementById("trans_table");
const transHistory = () => {
  const res = APIRequest(
    "php-includes/api/api_transaction_history.php",
    "GET",
    {
      transHistory: "jueteng_transHistory",
    }
  );

  res.then(function (response) {
    const res = JSON.parse(response);
    // console.log(res);

    if(res.error !== 'no_record_found') {
      $('#th_tbl_msg').removeClass('table_message_show');
      $('#th_tbl_msg').addClass('table_message_hide');

      $("#trans_table tr").remove();

      let row1 = transHistoryTable.insertRow(0);
      let row2 = transHistoryTable.insertRow(1);
      
      for (let i = 0; i < res.data.length; i++) {

        let formatDate = new Date(res.data[i].game_date);
        let newDate = `${formatDate.getMonth() + 1}-${formatDate.getDate()}-${formatDate.getFullYear()}`;

        let cell1 = row1.insertCell(i);
        let cell2 = row2.insertCell(i);
        let gameTime = "";
        let noResult = "<span class='no_result'> No result </span> ";

        if (i === 0) {
            // cell1.style.boxShadow = '.2px .2px green';
            // cell2.style.boxShadow = '.5px .5px 5px green';
            if(res.data[i].game_time === 'Morning' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            8:30AM <br> 
                            ${noResult}
                          </p>`;

            } else if(res.data[i].game_time === 'Afternoon' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            3:30PM <br> 
                            ${noResult}
                          </p>`;
            } else if(res.data[i].game_time === 'Evening' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            8:30PM <br> 
                            ${noResult}
                          </p>`;
            } else if (res.data[i].game_time === 'Morning' && res.data[i].status === 'Closed'){
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'> 8:30AM </p>`;
            } else if (res.data[i].game_time === 'Afternoon' && res.data[i].status === 'Closed') {
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'> 3:30PM </p>`;
            } else if (res.data[i].game_time === 'Evening' && res.data[i].status === 'Closed') {
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'>8:30PM </p>`;
            }
        
            cell1.style.boxShadow = 'inset 0 0 10px red';
            cell2.style.boxShadow = 'inset 0 0 10px red';
                      
            cell1.innerHTML = `
            <div class="table-header"> 
              ${newDate}
              ${gameTime}
            </div>`;

            cell2.innerHTML = `
            <div class='d-flex justify-content-center align-items-center'>
              <span class='ball ball_color1'> ${res.data[i].first_ball} </span> - 
              <span class='ball ball_color2'> ${res.data[i].second_ball} </span> - 
              <span class='ball ball_color3'> ${res.data[i].third_ball} </span>
            </div>`;
        } else {

            if(res.data[i].game_time === 'Morning' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            8:30AM <br> 
                            ${noResult}
                          </p>`;

            } else if(res.data[i].game_time === 'Afternoon' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            3:30PM <br> 
                            ${noResult}
                          </p>`;
            } else if(res.data[i].game_time === 'Evening' && res.data[i].status === 'Open') {
              gameTime = `<br> (${res.data[i].game_time}) <br> 
                          <p style='margin:0;'> 
                            8:30PM <br> 
                            ${noResult}
                          </p>`;
            } else if (res.data[i].game_time === 'Morning' && res.data[i].status === 'Closed'){
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'> 8:30AM </p>`;
            } else if (res.data[i].game_time === 'Afternoon' && res.data[i].status === 'Closed') {
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'> 3:30PM </p>`;
            } else if (res.data[i].game_time === 'Evening' && res.data[i].status === 'Closed') {
              gameTime = `<br> (${res.data[i].game_time}) <br> <p style='margin:0;'>8:30PM </p>`;
            }
        
              cell1.innerHTML = `
              <div class="table-header"> 
                ${newDate}
                ${gameTime}
              </div>`;
              
              cell2.innerHTML = `
              <div class='d-flex justify-content-center align-items-center'>
                <span class='ball ball_color1'> ${res.data[i].first_ball} </span> - 
                <span class='ball ball_color2'> ${res.data[i].second_ball} </span> - 
                <span class='ball ball_color3'> ${res.data[i].third_ball} </span>
              </div>`;
          }
        }

    } else {
      transHistoryTable.innerHTML = "";
      $('#th_tbl_msg').removeClass('table_message_hide');
      $('#th_tbl_msg').addClass('table_message_show');
    }

  });
}
