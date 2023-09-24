let bettingList = [];
let isUpdateBet = false;
let updateId = 0;
let combinationList = {
  first: null,
  second: null,
  third: null
}

let betAreaDraw = {
    game_time: '',
    bet_area: ''
};

let totalDraw = {D1:0, D2:0, D3:0, D4:0, D5:0, D6:0}; 

$(document).ready(function () {  

  $('#submit_form').removeClass("submitFormHide");
  $('#submit_form').addClass("submitFormShow");

  $('#betting-btn2').attr('disabled', 'true');
  $('#betting-btn3').attr('disabled', 'true');

  $('#add_bet').attr('disabled', 'true');
  $('#bet_list_count').hide();

  $('#submit').attr('disabled', 'true');

  let finalWallet = 0;
  let betAmountLimiter = 0;
  let inputNumber = "";
  let combiPick = "";
  let tableTempId = 0;

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

  const bettingAreaBtn = () => {
    // Initial Disabled Swer3(Local) Button
    $('#local_draw').text('Swer3 (Close)');
    $('#local_draw').attr('disabled','true');
    $('#local_draw').removeClass("local_btn");
    $('#local_draw').addClass("disabled_btn");

    // Initial Disabled 3d(National) Button
    $('#national_draw').text('3D (Close)');
    $('#national_draw').attr('disabled','true');
    $('#national_draw').removeClass("national_btn");
    $('#national_draw').addClass("disabled_btn");
  }

  // Initial Button Status
  gameCLosed();
  bettingAreaBtn();

  const gameOpened = (data) => {

    for (let i = 0; i < data.length; i++) {

      if(data[i].game_status === 'Open' && (data[i].game_time === 'D1' || data[i].game_time === 'D2')) {
        $('#bet_morning').addClass("btn-bet-open");
        $('#bet_morning').removeClass("btn-bet-close");
        $('#bet_morning').text('Place Bet');
        $('#bet_morning').removeAttr('disabled');
      }

      if(data[i].game_status === 'Open' && (data[i].game_time === 'D3' || data[i].game_time === 'D4')) {
        $('#bet_afternoon').addClass("btn-bet-open");
        $('#bet_afternoon').removeClass("btn-bet-close");
        $('#bet_afternoon').text('Place Bet');
        $('#bet_afternoon').removeAttr('disabled');
      } 

      if(data[i].game_status === 'Open' && (data[i].game_time === 'D5' || data[i].game_time === 'D6')) {
        $('#bet_evening').addClass("btn-bet-open");
        $('#bet_evening').removeClass("btn-bet-close");
        $('#bet_evening').text('Place Bet');
        $('#bet_evening').removeAttr('disabled');
      } 

    }
 
    let gameTime = $('#game_time').val();
    bettingArea(gameTime,data);
  }

  const bettingArea = (gameTime,data) => {
    // Open Swere3(Local) Button
    $('#local_draw').text('Swer3');
    $('#local_draw').removeAttr('disabled');
    $('#local_draw').removeClass("disabled_btn");
    $('#local_draw').addClass("local_btn");

    // Open 3D(National) Button
    $('#national_draw').text('3D');
    $('#national_draw').removeAttr('disabled');
    $('#national_draw').removeClass("disabled_btn");
    $('#national_draw').addClass("national_btn");

    for (let i = 0; i < data.length; i++) {

      if(gameTime === "Morning" && data[i].game_status === 'Close' && data[i].game_time === 'D1') {
        $('#local_draw').text('Swer3 (Close)');
        $('#local_draw').attr('disabled','true');

        $('#local_draw').removeClass("local_btn");
        $('#local_draw').addClass("disabled_btn");

      } else if(gameTime === "Morning" && data[i].game_status === 'Close' && data[i].game_time === 'D2') {
        $('#national_draw').text('3D (Close)');
        $('#national_draw').attr('disabled','true');

        $('#national_draw').removeClass("national_btn");
        $('#national_draw').addClass("disabled_btn");
      }

      if(gameTime === "Afternoon" && data[i].game_status === 'Close' && data[i].game_time === 'D3') {
        $('#local_draw').text('Swer3 (Close)');
        $('#local_draw').attr('disabled','true');

        $('#local_draw').removeClass("local_btn");
        $('#local_draw').addClass("disabled_btn");

      } else if(gameTime === "Afternoon" && data[i].game_status === 'Close' && data[i].game_time === 'D4') {
        $('#national_draw').text('3D (Close)');
        $('#national_draw').attr('disabled','true');

        $('#national_draw').removeClass("national_btn");
        $('#national_draw').addClass("disabled_btn");
      }

      if(gameTime === "Evening" && data[i].game_status === 'Close' && data[i].game_time === 'D5') {
        $('#local_draw').text('Swer3 (Close)');
        $('#local_draw').attr('disabled','true');

        $('#local_draw').removeClass("local_btn");
        $('#local_draw').addClass("disabled_btn");

      } else if(gameTime === "Evening" && data[i].game_status === 'Close' && data[i].game_time === 'D6') {
        $('#national_draw').text('3D (Close)');
        $('#national_draw').attr('disabled','true');

        $('#national_draw').removeClass("national_btn");
        $('#national_draw').addClass("disabled_btn");
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
      const { wallet, starting_wallet } = res.data;

      if(res.error === "user_not_exist") {
        $('#balance').text('0.00');
        $('#starting_balance').text('0.00');
        return 0;
      } else {
        // $('#balance').text(`₱${wallet.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
        $('#starting_balance').text(`₱${parseInt(starting_wallet).toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
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

      let totalBets = 0;

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

        $('#balance').text(`Total Bet:  ₱${totalBets.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);

      } else {

        for (let i = 0; i < res.data.length; i++) {

          if(res.data[i].game_time == "D1") {
            totalDraw.D1 = res.data[i].total_bet;
          } else if(res.data[i].game_time == "D2") {
            totalDraw.D2 = res.data[i].total_bet;
          } else if(res.data[i].game_time == "D3") {
            totalDraw.D3 = res.data[i].total_bet;
          } else if(res.data[i].game_time == "D4") {
            totalDraw.D4 = res.data[i].total_bet;
          } else if(res.data[i].game_time == "D5") {
            totalDraw.D5 = res.data[i].total_bet;
          } else if(res.data[i].game_time == "D6") {
            totalDraw.D6 = res.data[i].total_bet;
          }

          totalBets += parseInt(res.data[i].total_bet);
        }

        // Morning D1 & D2 Draw
        // if(totalDraw.D1 === 0 && totalDraw.D2 === 0) {
        //   $('#morning_combi').html(`
        //     <p class="mb-0 totalBetResult"> <span class="total_text"> Total Bet: </span> 0 </p>
        //   `);
        // } else {
        //   $('#morning_d1').html(`
        //     <p class="mb-0 totalBetResult"> <span class="total_text"> D1: </span> 
        //       ₱${parseInt(totalDraw.D1).toLocaleString(undefined, { minimumFractionDigits: 2 })}
        //     </p>
        //   `);

        //   $('#morning_d2').html(`
        //   <p class="mb-0 totalBetResult"> <span class="total_text"> D2: </span> 
        //     ₱${parseInt(totalDraw.D2).toLocaleString(undefined, { minimumFractionDigits: 2 })}
        //   </p>
        // `);
        // }

        // Morning D1 Draw
        if(totalDraw.D1 === 0) {
          $('#morning_d1').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D1: </span> 
              ₱${parseInt(totalDraw.D1).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#morning_d1').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D1: </span> 
              ₱${parseInt(totalDraw.D1).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

        // Morning D2 Draw
        if(totalDraw.D2 === 0) {
          $('#morning_d2').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D2: </span>
              ₱${parseInt(totalDraw.D2).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#morning_d2').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D2: </span> 
              ₱${parseInt(totalDraw.D2).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

         // Afternoon D3 Draw
         if(totalDraw.D3 === 0) {
          $('#afternoon_d3').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D3: </span> 
              ₱${parseInt(totalDraw.D3).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#afternoon_d3').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D3: </span> 
              ₱${parseInt(totalDraw.D3).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

        // Afternoon D4 Draw
        if(totalDraw.D4 === 0) {
          $('#afternoon_d4').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D4: </span>
              ₱${parseInt(totalDraw.D4).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#afternoon_d4').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D4: </span> 
              ₱${parseInt(totalDraw.D4).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

        // Evening D5 Draw
        if(totalDraw.D5 === 0) {
          $('#evening_d5').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D5: </span> 
              ₱${parseInt(totalDraw.D5).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#evening_d5').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D5: </span> 
              ₱${parseInt(totalDraw.D5).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

        // Evening D6 Draw
        if(totalDraw.D6 === 0) {
          $('#evening_d6').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D6: </span>
              ₱${parseInt(totalDraw.D6).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        } else {
          $('#evening_d6').html(`
            <p class="mb-0 totalBetResult"> <span class="total_text"> D6: </span> 
              ₱${parseInt(totalDraw.D6).toLocaleString(undefined, { minimumFractionDigits: 2 })}
            </p>
          `);
        }

        $('#balance').text(`Total Bet:  ₱${totalBets.toLocaleString(undefined, { minimumFractionDigits: 2 })}`);

      }
    
    });
  }

  // Note: Open Morning Betting Modal
  $('#bet_morning').on('click', function() {

    bettingAreaBtn();

    $('#modalBalance').text(`Balance: ₱${parseInt(finalWallet).toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Morning');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');

    $('#betting-btn1').removeAttr('disabled');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');

    $('#combi_type').css({border: '2px solid #b30000'});
    $('#combi_type').val('0');

    $('#generate').show();
    
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");
    
    bettingList = [];
    $('#combi_type').removeAttr('disabled');
    $('#generate').removeAttr('disabled');
    $('#betAmount').removeAttr('disabled');
    $('#remark').removeAttr('disabled');
    $('#bet_list_count').hide();

    isBetPlace();
  });

  // Note: Open Afternoon Betting Modal
  $('#bet_afternoon').on('click', function() {

    bettingAreaBtn();

    $('#modalBalance').text(`Balance: ₱${parseInt(finalWallet).toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Afternoon');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');

    $('#betting-btn1').removeAttr('disabled');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');
    
    $('#combi_type').css({border: '2px solid #b30000'});
    $('#combi_type').val('0');

    $('#generate').show();
 
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");

    bettingList = [];
    $('#combi_type').removeAttr('disabled');
    $('#generate').removeAttr('disabled');
    $('#betAmount').removeAttr('disabled');
    $('#remark').removeAttr('disabled');
    $('#bet_list_count').hide();

    isBetPlace();
  });

   // Note: Open Evening Betting Modal
   $('#bet_evening').on('click', function() {
    
    bettingAreaBtn();

    $('#modalBalance').text(`Balance: ₱${parseInt(finalWallet).toLocaleString(undefined, { minimumFractionDigits: 2 })}`);
    $('#game_time').val('Evening');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');

    $('#betting-btn1').removeAttr('disabled');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');

    $('#combi_type').css({border: '2px solid #b30000'});
    $('#combi_type').val('0');

    $('#generate').show();
 
    $('#submit_form').removeClass("submitFormShow");
    $('#submit_form').addClass("submitFormHide");

    bettingList = [];
    $('#combi_type').removeAttr('disabled');
    $('#generate').removeAttr('disabled');
    $('#betAmount').removeAttr('disabled');
    $('#remark').removeAttr('disabled');
    $('#bet_list_count').hide();

    isBetPlace();
  });

  // Local Draw
  $('#local_draw').on('click', function() {
    betAreaDraw.bet_area = "Local Draw";

    if($('#game_time').val() === "Morning") {
      betAreaDraw.game_time = "D1";
    } else if($('#game_time').val() === "Afternoon") {
      betAreaDraw.game_time = "D3";
    } else if($('#game_time').val() === "Evening") {
      betAreaDraw.game_time = "D5";
    }

  });

  // National Draw
  $('#national_draw').on('click', function() {
    betAreaDraw.bet_area = "National Draw";

    if($('#game_time').val() === "Morning") {
      betAreaDraw.game_time = "D2";
    } else if($('#game_time').val() === "Afternoon") {
      betAreaDraw.game_time = "D4";
    } else if($('#game_time').val() === "Evening") {
      betAreaDraw.game_time = "D6";
    }

  });

  $('#betting-btn1').on('click', function() {    
    combiPick = "Manual";
    $("#numberKeyPadModal").modal("show");
    inputNumber = "betting_input1";
    $('#generate').hide();
  });

  $('#betting-btn2').on('click', function() {    
    $("#numberKeyPadModal").modal("show");
    inputNumber = "betting_input2";
  });

  $('#betting-btn3').on('click', function() {   
    $('#add_bet').attr('disabled', 'true'); 
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

  $('#combi_type').css({border: '2px solid #b30000'});
  
  let ifValid = false;

  // Note: Combination Type 
  $('#combi_type').on('change', function(e) {
    if($(this).val() == 0) {
      $('#combi_type').css({border: '2px solid #b30000'});
      $('#add_bet').attr('disabled', 'true');
    } else {
      $('#combi_type').css({border: '2px solid green'});
      if($('#betAmount').val() !== '' && ifValid) {
        $('#add_bet').removeAttr('disabled');
      } else {  
        $('#add_bet').attr('disabled', 'true');
      }
    }
  });

  // Note: Bet Amount Validation
  $('#betAmount').on('input', function (evt) {
    var inputVal = evt.target.value;

    if (inputVal.length === 0) {
        evt.target.className = 'form-control text-center betAmount';
        $('#err_msg').removeClass("error_message_show");
        $('#err_msg').addClass("error_message_hide");
        $('#add_bet').attr('disabled', 'true');     
        ifValid = false; 
        return;
    } else if(inputVal <= 0) {
        evt.target.className = 'form-control text-center invalid';
        $('#err_msg').removeClass("error_message_hide");
        $('#err_msg').addClass("error_message_show");
        $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Invalid Amount </p>`);

        $('#add_bet').attr('disabled', 'true');
        ifValid = false; 
        return; 
    } else if(inputVal < 10) {
      evt.target.className = 'form-control text-center invalid';
      $('#err_msg').removeClass("error_message_hide");
      $('#err_msg').addClass("error_message_show");
      $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Minimum Bet is 10 </p>`);

      $('#add_bet').attr('disabled', 'true');
      ifValid = false; 
      return; 
    } else if(inputVal > betAmountLimiter && inputVal < parseInt(finalWallet)) {
      evt.target.className = 'form-control text-center invalid';
      $('#err_msg').removeClass("error_message_hide");
      $('#err_msg').addClass("error_message_show");
      $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> 
                            Max bet to this combination is reached </br>
                            Please select other combination
                          </p>`);

      $('#add_bet').attr('disabled', 'true');
      ifValid = false; 
      return;
    } else if(inputVal > parseInt(finalWallet)) {
        evt.target.className = 'form-control text-center invalid';
        $('#err_msg').removeClass("error_message_hide");
        $('#err_msg').addClass("error_message_show");
        $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Please check your balance. </p>`);

        $('#add_bet').attr('disabled', 'true');
        ifValid = false; 
        return;
    } else if(combinationList.first === null || combinationList.second === null || combinationList.third === null) {
        evt.target.className = 'form-control text-center invalid';
        $('#err_msg').removeClass("error_message_hide");
        $('#err_msg').addClass("error_message_show");
        $('#err_msg').html(`<p style="color: #ff1a1a; margin: 10px 0;"> Please pick number combination. </p>`);

        $('#add_bet').attr('disabled', 'true');
        ifValid = false; 
        return;
    } else if($('#combi_type').val() == 0) {
        evt.target.className = 'form-control text-center valid';
        $('#err_msg').removeClass("error_message_show");
        $('#err_msg').addClass("error_message_hide");
        $('#add_bet').attr('disabled', 'true');
        ifValid = true; 
        return;
    } else {
        evt.target.className = 'form-control text-center valid';
        $('#err_msg').removeClass("error_message_show");
        $('#err_msg').addClass("error_message_hide");
        $('#add_bet').removeAttr('disabled');
        ifValid = true; 
        return;
    }   

  });

  $('#generate').on('click', function() {

    combiPick = "Lucky";
    
    $('#betting-btn1').attr('disabled', 'true');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');

    const first_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;
    const second_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;
    const third_num = Math.floor(Math.random() * (9 - 0 + 1)) + 0;

    $('#betting_input1').val(first_num);
    $('#betting_input2').val(second_num);
    $('#betting_input3').val(third_num);

    $('#betting_input1').css({border: '3px solid green'});
    $('#betting_input2').css({border: '3px solid green'});
    $('#betting_input3').css({border: '3px solid green'});

    $('#submit_form').removeClass("submitFormHide");
    $('#submit_form').addClass("submitFormShow");

    if($('#betAmount').val() > 0) {
      $('#add_bet').removeAttr('disabled');
    } else {
      $('#add_bet').attr('disabled', 'true');
    }

    combination(first_num,1);
    combination(second_num,2);
    combination(third_num,3);
  });

  $('#betting_list').on('click', function() {
      $('#bettingListModal').modal('show');

      $('#betting_list_table tbody').empty();

      for (let i = 0; i < bettingList.length; i++) {
        $('#betting_list_table tbody').append(`
          <tr id="row${i}">
            <td> ${i+1} </td>
            <td> ${bettingList[i].bet_combi.first} - ${bettingList[i].bet_combi.second} - ${bettingList[i].bet_combi.third} </td>
            <td> ${bettingList[i].type} </td>
            <td> ₱${bettingList[i].amount.toLocaleString(undefined, { minimumFractionDigits: 2 })} </td>
            <td> ${bettingList[i].remark} </td>
            <td> 
              <div class="gap-2">
                <img type="button" src="src/assets/img/edit_icon.png" class="btnlist_action" alt="delete-icon" height="30" width="30" onClick="editBet(${i+1})"> 
                <img type="button" src="src/assets/img/delete_icon.png" class="btnlist_action" alt="delete-icon" height="30" width="30" onClick="deleteBet(${i+1})"> 
              </div>
            </td>
          </tr>
        `);
      }
  });
 
  const resetBet = () => {
    $('#combi_type').val('0');
    $('#betAmount').val('');

    $('#betAmount').removeClass("valid");
    $('#betAmount').addClass("betAmount");
    $('#combi_type').css({border: '2px solid #b30000'});
    $('#add_bet').attr('disabled', 'true');

    $('#betting_input1').val('#');
    $('#betting_input2').val('#');
    $('#betting_input3').val('#');

    $('#betting_input1').css({border: '3px solid #b30000'});
    $('#betting_input2').css({border: '3px solid #b30000'});
    $('#betting_input3').css({border: '3px solid #b30000'});
    
    $('#betting-btn1').removeAttr('disabled');
    $('#betting-btn2').attr('disabled', 'true');
    $('#betting-btn3').attr('disabled', 'true');
  
    $('#generate').show();
    $('#remark').val('');
  }

  const sameCombi = (combinationList) => {
    if(combinationList.first === combinationList.second && combinationList.second === combinationList.third && combinationList.first === combinationList.third) {
      return true;
    } else {
      return false;
    }
  }

  $('#add_bet').on('click', function() {

    // Note: Update Bet
    if(isUpdateBet) {
      const betIndex = bettingList.findIndex(x => (x.id === updateId));

      const newBetList = [
        ...bettingList.slice(0, betIndex),
        { ...bettingList[betIndex], 
            bet_combi: {
              first: $('#betting_input1').val(),
              second: $('#betting_input2').val(),
              third: $('#betting_input3').val()
            },
            type: $('#combi_type').val(),
            amount: $('#betAmount').val(),
            remark: $('#remark').val()
        },
        ...bettingList.slice(betIndex + 1),
      ];

      bettingList = newBetList;
      resetBet();
      $('#add_bet').text('Add Bet');
      $('#submit').removeAttr('disabled');

      isUpdateBet = false;
      return;

    } else {

      // Note: Insert Bet
      let list = {
        id: ++tableTempId,
        bet_combi: combinationList,
        type: (sameCombi(combinationList)) ? 'Straight Ball': $('#combi_type').val(),
        amount: $('#betAmount').val(),
        remark: $('#remark').val(),
        gameTime: $('#game_time').val(),
        combiPick,
        betAreaDraw,
        raffleCode: (combiPick === 'Lucky') ? raffleCode() : '',
      }

      bettingList.push(list);
      
      $('#bet_list_count').show();

      if(bettingList.length === 10) {
        $('#combi_type').attr('disabled', 'true');
        $('#generate').attr('disabled', 'true');
        $('#betAmount').attr('disabled', 'true');
        $('#remark').attr('disabled', 'true');

        $('#bet_list_count').text('Max');
      } else {
        $('#bet_list_count').text(bettingList.length);
      }

      combinationList = {
        first: null,
        second: null,
        third: null
      };

      resetBet();
      $('#submit').removeAttr('disabled');
    }

    
});



  // Note: Submit Button
  $('#submit').on('click', function() {
    
    let combiText = "";
    for (let i = 0; i < bettingList.length; i++) {
      combiText += `${bettingList[i].bet_combi.first} - ${bettingList[i].bet_combi.second} - ${bettingList[i].bet_combi.third} (${(bettingList[i].type === "Straight Ball") ? 'T' : 'R'}) <br>`;
    }

    const confirm = msgBox({icon:"info", title:`Are you sure ? <br> <span style="color:#00e64d;"> ${combiText} </span>`, isConfirm: true});

    confirm.then(function (res) {
      let ref = `${randString()}-${daysofYear(new Date()).day}-${daysofYear(new Date()).year}`;

      const data = {...bettingList, ref};

      console.log(data);

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
          
          console.log(res);

          if(res.error === "insert_bet_failed") {
            msgBox({icon:"error", title:"Insert bet failed."});
          } else {

            localStorage.setItem('receipt', JSON.stringify(res.data));

            bettingList = [];

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

    // const ticketInfo = JSON.parse(localStorage.getItem('receipt'));
    $("#receiptModal").modal("show");
    let transDateTime = ticketInfo[ticketInfo.length-1].date.split(" ");

    $('#ticket_trans_date').text(transDateTime[0]);
    $('#ticket_trans_time').text(transDateTime[1]);
    $('#ticket_number').text(ticketInfo[ticketInfo.length-1].ticket_number);

    if(ticketInfo[ticketInfo.length-1].game_time === "D1") {
      gameDraw = "MORNING DRAW (Local)";
    } else if(ticketInfo[ticketInfo.length-1].game_time === "D2") {
      gameDraw = "MORNING DRAW (National)";
    } else if(ticketInfo[ticketInfo.length-1].game_time === "D3") {
      gameDraw = "AFTERNOON DRAW (Local)";
    } else if(ticketInfo[ticketInfo.length-1].game_time === "D4") {
      gameDraw = "AFTERNOON DRAW (National)";
    } else if(ticketInfo[ticketInfo.length-1].game_time === "D5") {
      gameDraw = "EVENING DRAW (Local)";
    } else if(ticketInfo[ticketInfo.length-1].game_time === "D6") {
      gameDraw = "EVENING DRAW (National)";
    }

    $('#game_draw').text(gameDraw);   

    let total = 0;
    for (let i = 0; i < ticketInfo.length; i++) {
        $('#ticket_table tbody').append(`
            <tr>
                <td>  
                    ${ticketInfo[i].first_ball}${ticketInfo[i].second_ball}${ticketInfo[i].third_ball}
                </td>
                
                <td>
                    ${(ticketInfo[i].combi_type === 'Straight Ball') ? 'T' : 'R'}
                </td>

                <td>
                    ${ticketInfo[i].amount.toLocaleString(undefined, { minimumFractionDigits: 2 })}
                </td>
            </tr>
        `);
        total += parseInt(ticketInfo[i].amount);

        if(ticketInfo[i].raffle_code !== "") {
          $('#raffle_code').append(`
              <p class="mb-0" style="font-size:12px; color:#000000;"> 
                  Raffle Code: ${ticketInfo[i].raffle_code}
              </p>
          `);
        }
    }
    

    $('#total_amount').text(`${total} / 1 WINS 450`); 
    $('#kiosk').text(`Kiosk: ${ticketInfo[ticketInfo.length-1].username}`); 

  }

  $('#print_receipt').on('click', function() {
    // window.open = 'https://kiosk.swer3.live/templates/ticket.php', '_blank';
    window.open = 'http://192.168.108.79/templates/ticket.php', '_self';
  });

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

    if(bettingList.length > 0 && !isUpdateBet) {
      $('#submit').removeAttr('disabled');
    } else if(bettingList.length > 0 && bettingList.length < 10) {
      $('#bet_list_count').show();
      $('#bet_list_count').text(bettingList.length);
    } else { 
      $('#bet_list_count').hide(); 
      $('#submit').attr('disabled', 'true');
    }

  }, 1000);

  // Note: Additional Functions 
  const randString = () => {
    return Math.random().toString(36).substring(2, 5).toUpperCase() + 
    Math.random().toString(36).substring(2, 5).toUpperCase() + 
    Math.random().toString(36).substring(2, 5).toUpperCase()
  }

  const raffleCode = () => {
    return Math.random().toString(36).substring(2, 5).toUpperCase() +
    Math.random().toString(36).substring(3, 5).toUpperCase() 
  }
  
  const daysofYear = (date) => {
    const day = (Date.UTC(date.getFullYear(), date.getMonth(), date.getDate()) - Date.UTC(date.getFullYear(), 0, 0)) / 24 / 60 / 60 / 1000;
    const data = {
      day,
      year: date.getFullYear()
    }
    return data;
  }


}); // End of document.ready

const editBet = (listId) => {

  const betIndex = bettingList.findIndex(x => (x.id === listId));

  $('#betting_input1').val(bettingList[betIndex].bet_combi.first);
  $('#betting_input2').val(bettingList[betIndex].bet_combi.second);
  $('#betting_input3').val(bettingList[betIndex].bet_combi.third);
  $('#betting_input1').css({border: '3px solid green'});
  $('#betting_input2').css({border: '3px solid green'});
  $('#betting_input3').css({border: '3px solid green'});

  $('#combi_type').val(bettingList[betIndex].type);
  $('#combi_type').css({border: '2px solid green'});

  $('#betAmount').val(bettingList[betIndex].amount);
  $('#betAmount').removeClass("betAmount");
  $('#betAmount').addClass("valid");
  
  $('#remark').val(bettingList[betIndex].remark);

  $('#add_bet').text("Update Bet");
  $('#add_bet').removeAttr("disabled");

  combinationList = {
    first: bettingList[betIndex].bet_combi.first,
    second: bettingList[betIndex].bet_combi.second,
    third: bettingList[betIndex].bet_combi.third
  };

  isUpdateBet = true;
  updateId = listId;
  $('#bettingListModal').modal('hide');
  $('#submit').attr('disabled', 'true');

}

const deleteBet = (listId) => {
  
  const betIndex = bettingList.findIndex(x => (x.id === listId));

  const newBetList = [
    ...bettingList.slice(0, betIndex),
    ...bettingList.slice(betIndex + 1),
  ];

  bettingList = newBetList;
  delTableRow(listId);
  $('#bet_list_count').text(bettingList.length);

  if(bettingList.length === 0) {
    $('#bet_list_count').hide();
    $('#submit').attr('disabled', 'true');
  }
}

const delTableRow = (listId) => {
    var table_row = $("td").filter(function (idx) {
      return $("td").eq(idx).text().trim() == listId;
    });

    if (table_row.length > 0) {
        table_row.closest("tr").remove();
    } else {
        console.log('nothing matching given_value!');
    }
}
