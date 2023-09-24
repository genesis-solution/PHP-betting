$(document).ready(function () {  
  $('#betting-btn2').attr('disabled', 'true');
  $('#betting-btn3').attr('disabled', 'true');
  $('#submit').attr('disabled', 'true');

  let finalWallet = 0;
  let betAmountLimiter = 0;
  let inputNumber = "";
  let combinationList = {
    first: null,
    second: null,
    third: null
  }

  $('#stream_btn').on('click', function() {
    $("#streamModal").modal("show");
  });

  const betLimiter = () => {

    const res = APIRequest(
      "php-includes/api/api_bet_limiter.php",
      "GET",
      {
        betLimiter : "jueteng_betLimiter",
      }
    );

    const limiter = res.then(function (response) {
      const res = JSON.parse(response);
      
      const { data: total_gross } = res;
      let gross_bets = 0;
      
      if(total_gross < 1000000 || res.error === 'no_bet_found') {
        gross_bets = 500000;
      } else {
        gross_bets = total_gross;
      } 

      let percentage_1 = 0.58;
      let percentage_2 = 0.42;
      let percentage_3 = 0.10;
      let winning_amount = 450;

      let less1 = gross_bets * percentage_2;
      let less2 = gross_bets - less1;
      let less3 = less2 * percentage_3;
      let less4 = less2 - less3;
      let max_bet = less4 /winning_amount;

      return max_bet;      
    });

    return limiter;
  }
  
  const gameCLosed = () => {
    // Morning Button Closed
    $('#bet_morning').addClass("btn-bet-close");
    $('#bet_morning').removeClass("btn-bet-open");
    $('#bet_morning').text('Closed');  
    $('#bet_morning').attr('disabled', 'true');

    // Afternoon Button Closed
    $('#bet_afternoon').addClass("btn-bet-close");
    $('#bet_afternoon').removeClass("btn-bet-open");
    $('#bet_afternoon').text('Closed');  
    $('#bet_afternoon').attr('disabled', 'true');

    // Evening Button Closed
    $('#bet_evening').addClass("btn-bet-close");
    $('#bet_evening').removeClass("btn-bet-open");
    $('#bet_evening').text('Closed');  
    $('#bet_evening').attr('disabled', 'true');
  }

  // Initial Button Status
  gameCLosed();

  const gameOpened = (data) => {
    for (let i = 0; i < data.length; i++) {
      if(data[i].game_status === 'Open' && data[i].game_time === 'morning') {
        $('#bet_morning').addClass("btn-bet-open");
        $('#bet_morning').removeClass("btn-bet-close");
        $('#bet_morning').text('Place Bet');
        $('#bet_morning').removeAttr('disabled');
      }

      if(data[i].game_status === 'Open' && data[i].game_time === 'afternoon') {
        $('#bet_afternoon').addClass("btn-bet-open");
        $('#bet_afternoon').removeClass("btn-bet-close");
        $('#bet_afternoon').text('Place Bet');
        $('#bet_afternoon').removeAttr('disabled');
      } 

      if(data[i].game_status === 'Open' && data[i].game_time === 'evening') {
        $('#bet_evening').addClass("btn-bet-open");
        $('#bet_evening').removeClass("btn-bet-close");
        $('#bet_evening').text('Place Bet');
        $('#bet_evening').removeAttr('disabled');
      } 
    }
  }

  const balance = () => {
    const res = APIRequest(
      "php-includes/api/api_balance.php",
      "GET",
      {
        userBalance: "jueteng_userBalance",
      }
    );

    const final = res.then(function (response) {
      const res = JSON.parse(response);
      const { data:wallet } = res;

      if(res.error === "user_not_exist") {
        $('#balance').text('0.00');
        return 0;
      } else {
        $('#balance').text(`₱${wallet.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
        return wallet;
      }
    });

    return final;
  }

  const gameStatus = () => {
    const res = APIRequest(
      "php-includes/api/api_game_status.php",
      "GET",
      {
        gameStatus: "jueteng_gameStatus",
      }
    );

    res.then(function (response) {
      const res = JSON.parse(response);
      
      gameCLosed();
  
      if(res.error === "user_not_exist") {
        gameCLosed();
      } else {
        gameOpened(res.data);
      }
      
    });
  }

  const gameResult = () => {
    const res = APIRequest(
      "php-includes/api/api_game_result.php",
      "GET",
      {
        gameResult: "jueteng_gameResult",
      }
    );

    res.then(function (response) {
      const res = JSON.parse(response);
      // console.log(res.data);
      
      if(res.error === "no_record_found") {
        // $('#morning_combi').removeClass('num-wrapper-result');
        // $('#morning_combi').addClass('num-wrapper');
        $('#morning_combi').html(`
          <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
        `);

        $('#afternoon_combi').html(`
          <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
        `);

        $('#evening_combi').html(`
          <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
        `);

      } else {

        // Note: Check which game time has no result.
        for (let i = 0; i < res.data.length; i++) {

          if(res.data[i].game_time !== "Morning") {
            // $('#morning_combi').removeClass('num-wrapper-result');
            // $('#morning_combi').addClass('num-wrapper');
            $('#morning_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
            `);
          } 
          
          if(res.data[i].game_time !== "Afternoon") {
            $('#afternoon_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>

            `);
          } 
          
          if(res.data[i].game_time !== "Evening") {
            $('#evening_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
            `);
          } 
        }

        // Note: Check if there is game result
        for (let i = 0; i < res.data.length; i++) {
          // let combinations = res.data[i].result.split('-');
          if(res.data[i].game_time === "Morning") {
            // $('#morning_combi').removeClass('num-wrapper');
            // $('#morning_combi').addClass('num-wrapper-result');
            $('#morning_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 
                ₱${res.data[i].total_bet.toLocaleString(undefined, { minimumFractionDigits: 2 })}
              </p>
            `);
          } else if(res.data[i].game_time === "Afternoon") {
            $('#afternoon_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 
                ₱${res.data[i].total_bet.toLocaleString(undefined, { minimumFractionDigits: 2 })}  
              </p>
            `);
          } else if(res.data[i].game_time === "Evening") {
            $('#evening_combi').html(`
              <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 
                ₱${res.data[i].total_bet.toLocaleString(undefined, { minimumFractionDigits: 2 })}
              </p>
            `);
          }  
        }
      }
    
    });
  }

  // Note: Open Morning Betting Modal
  $('#bet_morning').on('click', function() {
    $('#modalBalance').text(`Balance: ₱${finalWallet.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Morning');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');
 
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");

    // $('#submit_form').addClass("submitFormShow");
    isBetPlace();
  });

  // Note: Open Afternoon Betting Modal
  $('#bet_afternoon').on('click', function() {
    $('#modalBalance').text(`Balance: ₱${finalWallet.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Afternoon');
    
    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');
 
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");

    // $('#submit_form').addClass("submitFormShow");
    isBetPlace();
  });

   // Note: Open Evening Betting Modal
   $('#bet_evening').on('click', function() {
    $('#modalBalance').text(`Balance: ₱${finalWallet.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Evening');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');
 
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");

    // $('#submit_form').addClass("submitFormShow");
    isBetPlace();
  });

  $('#betting-btn1').on('click', function() {    
    $("#numberKeyPadModal").modal("show");
    inputNumber = "betting_input1";
  });

  $('#betting-btn2').on('click', function() {    
    $("#numberKeyPadModal").modal("show");
    inputNumber = "betting_input2";
  });

  $('#betting-btn3').on('click', function() {    
    $("#numberKeyPadModal").modal("show");
    inputNumber = "betting_input3";
  });

  // Note: Number Keys =====================================================================
  
  // Key 1
  $('#key1').on('click', function() {
    $(`#${inputNumber}`).val(this.value);
    
    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    }
    
    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 2
  $('#key2').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    }

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 3
  $('#key3').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 4
  $('#key4').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 5
  $('#key5').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 6
  $('#key6').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 7
  $('#key7').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 8
  $('#key8').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 9
  $('#key9').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });

  // Key 0
  $('#key0').on('click', function() {
    $(`#${inputNumber}`).val(this.value);

    if(inputNumber === "betting_input1") {
      combination(parseInt(this.value),1);
    } else if (inputNumber === "betting_input2") {
      combination(parseInt(this.value),2);
    } else if (inputNumber === "betting_input3") {
      combination(parseInt(this.value),3);
    } 

    isBetPlace();
    $("#numberKeyPadModal").modal("hide");
  });
  // Note: Number Keys End ===============================================================

  // Note: Bet Amount Validation
  $('#betAmount').on('input', function (evt) {
    var inputVal = evt.target.value;

    if (inputVal.length === 0) {
        evt.target.className = 'form-control text-center betAmount';
        $('#err_msg').removeClass("error_message_show");
        $('#err_msg').addClass("error_message_hide");
        $('#submit').attr('disabled', 'true');      
        return;
    } else if(inputVal <= 0) {
        evt.target.className = 'form-control text-center invalid';
        $('#err_msg').removeClass("error_message_hide");
        $('#err_msg').addClass("error_message_show");
        $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Invalid Amount </p>`);

        $('#submit').attr('disabled', 'true');
    } else if(inputVal > betAmountLimiter && inputVal < finalWallet) {
      evt.target.className = 'form-control text-center invalid';
      $('#err_msg').removeClass("error_message_hide");
      $('#err_msg').addClass("error_message_show");
      $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> 
                            Max bet to this combination is reach </br>
                            Please select other combination
                          </p>`);

      $('#submit').attr('disabled', 'true');
    } else if(inputVal > finalWallet) {
        evt.target.className = 'form-control text-center invalid';
        $('#err_msg').removeClass("error_message_hide");
        $('#err_msg').addClass("error_message_show");
        $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Please check your balance. </p>`);

        $('#submit').attr('disabled', 'true');
    } else {
        evt.target.className = 'form-control text-center valid';
        $('#err_msg').removeClass("error_message_show");
        $('#err_msg').addClass("error_message_hide");
        $('#submit').removeAttr('disabled');
    }   

  });

  $('#generate').on('click', function() {
    const first_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;
    const second_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;
    const third_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;

    $('#betting_input1').val(first_num);
    $('#betting_input2').val(second_num);
    $('#betting_input3').val(third_num);

    $('#betting_input1').css({border: '3px solid green'});
    $('#betting_input2').css({border: '3px solid green'});
    $('#betting_input3').css({border: '3px solid green'});

    $('#betting-btn1').removeAttr('disabled');
    $('#betting-btn2').removeAttr('disabled');
    $('#betting-btn3').removeAttr('disabled');

    $('#submit_form').removeClass("submitFormHide");
    $('#submit_form').addClass("submitFormShow");

    combination(first_num,1);
    combination(second_num,2);
    combination(third_num,3);
  });


  // Note: Submit Button
  $('#submit').on('click', function() {

    let gameTime = $('#game_time').val();
    let ticket = `${randString()}-${daysofYear(new Date()).day}-${daysofYear(new Date()).year}`;
    
    let data = combination();
    data = {...data, amount: $('#betAmount').val(), gameTime, ticket};
    
    const confirm = msgBox({icon:"info", title:`Are you sure ? <br> <span style="color:#00e64d;"> ${data.first} - ${data.second} - ${data.third} </span>`, isConfirm: true});
    confirm.then(function (res) {
      if(res) {
        const res = APIRequest(
          "php-includes/api/api_bet.php",
          "POST",
          {
            insertBet: "jueteng_insertBet",
            data
          }
        );
    
        res.then(function (response) {
          const res = JSON.parse(response);
          // console.log(res);
    
          if(res.error === "insert_bet_failed") {
            msgBox({icon:"error", title:"Insert bet failed."});
          } else {
            $('#betAmount').val("");
            $('#betAmount').removeClass("valid");
            $('#betAmount').addClass("betAmount");
            $('#submit').attr('disabled', 'true');
            $("#bettingModal").modal("hide");
            msgBox({icon:"success", title:"Bet Placed."});
            msgBox({icon:"success", title:"Bet Placed.", cb: receipt(res.data)});
          }
        });
      }
    });
}); 
  
  // $("#receiptModal").modal("show");
  const receipt = (ticketInfo) => {

    $("#receiptModal").modal("show");
    const { bet_id, game_time, first_ball, second_ball, third_ball, amount, ticket_number, date} = ticketInfo;
    let transTime = date.split(" ");
    let gameDraw = "";
    
    if(game_time === "Morning") {
      gameDraw = "8:30AM DRAW";
    } else if(game_time === "Afternoon") {
      gameDraw = "3:30PM DRAW";
    } else if(game_time === "Evening") {
      gameDraw = "8:30PM DRAW";
    }

    $('#ticket_number').text(ticket_number);
    $('#game_draw').text(gameDraw);   
    $('#first_ball').html(`<b> ${first_ball} </b>`);
    $('#second_ball').html(`<b> ${second_ball} </b>`);
    $('#third_ball').html(`<b> ${third_ball} </b>`);
    $('#ticket_bet_amount').text(`₱${amount.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);

    // Note: QR Image
    $('#qr_image').attr('src',`https://chart.googleapis.com/chart?cht=qr&chl=http://localhost/jueteng.live/betting-history?ref=${bet_id}&chs=160x160&chld=L|0`);
    $('#betID').val(bet_id);
    $('#ticket_trans_time').text(transTime[1]);
    $('#game_time_ticket').val(game_time);      
  }

  // Note: Check if Combinations already placed
  const isBetPlace = () => {

    if($('#betting_input1').val() === '#') {
      $('#betting_input1').css({border: '3px solid #b30000'});
    } else {
      $('#betting_input1').css({border: '3px solid green'});
      $('#betting-btn2').removeAttr('disabled');
    }

    if($('#betting_input2').val() === '#') {
      $('#betting_input2').css({border: '3px solid #b30000'});
    } else {
      $('#betting_input2').css({border: '3px solid green'});
      $('#betting-btn3').removeAttr('disabled');
    }

    if($('#betting_input3').val() === '#') {
      $('#betting_input3').css({border: '3px solid #b30000'});
    } else {
      $('#betting_input3').css({border: '3px solid green'});
      $('#submit_form').removeClass("submitFormHide");
      $('#submit_form').addClass("submitFormShow");
    }
  }
  isBetPlace();
  
  // Note: Add Combinations in Object
  const combination = (selectedNumber,position) => {
    if(position === 1) {
      combinationList.first = selectedNumber;
    } else if(position === 2) {
      combinationList.second = selectedNumber;
    } else if (position === 3){
      combinationList.third = selectedNumber;
    }
    return combinationList;
  }

  transHistory();
  gameHistory();
  gameResult();

  // Note: Interval Functions 
  setInterval(function () {
    balance().then(function (res) {
      finalWallet = res;
    });  
    
    betLimiter().then(function (res) {
      betAmountLimiter = res;
    }); 

    gameStatus();
    transHistory();
    gameHistory();
    gameResult();
  }, 1000);

  // Note: Additional Functions 
  const randString = () => {
    return Math.random().toString(36).substring(2, 5).toUpperCase() + 
    Math.random().toString(36).substring(2, 5).toUpperCase() + 
    Math.random().toString(36).substring(2, 5).toUpperCase()
  }
  
  const daysofYear = (date) => {
    const day = (Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()) - Date.UTC(date.getFullYear(), 0, 0)) / 24 / 60 / 60 / 1000;
    const data = {
      day,
      year: date.getFullYear()
    }
    return data;
  }

});