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
        let lossResult = ' <span class="loss_result"> Loss </span>';
        let winResult = ' <span class="win_result"> Win </span>';

        if (i === 0) {

            // Note: Open Status
            if(res.data[i].game_time === 'D1' && res.data[i].status === 'Open') {
              gameTime = `<p style='margin:0;'> 
                            Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                            ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                            <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                              Reprint 
                            </button>
                          </p>`;

            } else if(res.data[i].game_time === 'D2' && res.data[i].status === 'Open') {
              gameTime = `<p style='margin:0;'> 
                            Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                            ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                            <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                              Reprint 
                            </button>
                          </p>`;
            } else if(res.data[i].game_time === 'D3' && res.data[i].status === 'Open') {
              gameTime = `<p style='margin:0;'> 
                            Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                            ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                            <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                              Reprint 
                            </button>
                          </p>`;
                          
            } else if(res.data[i].game_time === 'D4' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                              Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                              ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                              <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                              </button>
                            </p>`;
                            
            } else if(res.data[i].game_time === 'D5' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                              Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                              ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                              <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                              </button>
                            </p>`;
                            
            } else if(res.data[i].game_time === 'D6' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                              Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                              ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                              <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                              </button>
                            </p>`;
                            
            } 
            
            // Note: Closed Status
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Closed') { 
                gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            }

            // Note: if Loss the Game
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }
  
            // Note: if Win the Game
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
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

             // Note: Open Status
            if(res.data[i].game_time === 'D1' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                                Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                                </button>
                            </p>`;
  
            } else if(res.data[i].game_time === 'D2' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                                Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                                </button>
                            </p>`;
            } else if(res.data[i].game_time === 'D3' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                                Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                                </button>
                            </p>`;
                        
            } else if(res.data[i].game_time === 'D4' && res.data[i].status === 'Open') {
                    gameTime = `<p style='margin:0;'> 
                                    Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                    ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                    <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                    Reprint 
                                    </button>
                                </p>`;
                              
            } else if(res.data[i].game_time === 'D5' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                                Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                                </button>
                            </p>`;
                            
            } else if(res.data[i].game_time === 'D6' && res.data[i].status === 'Open') {
                gameTime = `<p style='margin:0;'> 
                                Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> 
                                ₱${parseInt(res.data[i].amount).toLocaleString(undefined, { minimumFractionDigits: 2 })} <br>
                                <button class="p-1 print_receipt" onClick="rePrint('${res.data[i].ticket_number}')" style="font-size:12px;"> 
                                Reprint 
                                </button>
                            </p>`;
                            
            } 
             
            // Note: Closed Status
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Closed') { 
                gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            } else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Closed') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) </p>`;
            }
            
            // Note: if Loss the Game
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Loss') {
              gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Loss') {
              gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Loss') {
              gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Loss') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${lossResult} </p>`;
            }

            // Note: if Win the Game
            else if (res.data[i].game_time === 'D1' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 1 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D2' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 2 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D3' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 3 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D4' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 4 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D5' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 5 (L)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
            }

            else if (res.data[i].game_time === 'D6' && res.data[i].status === 'Win') {
                gameTime = `<p style='margin:0;'> Draw 6 (N)(${(res.data[i].combi_type === "Straight Ball") ? "T": "R"}) <br> ${winResult} </p>`;
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

const rePrint = (ticket_number) => {
  const res = APIRequest(
    "php-includes/api/api_reprint.php",
    "GET",
    {
      rePrintReceipt: "pick3_rePrintReceipt",
      ticket_number
    }
  );

  res.then(function (response) {
    const res = JSON.parse(response);

    if(res.error) {
      console.log('no receipt found');
      return;
    }

	window.open(`https://kiosk.swer3.live/templates/ticket.php?ticket_number=${ticket_number}`);

  });

}
