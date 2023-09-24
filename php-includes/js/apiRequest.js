
async function APIRequest(url,method,data,secretToken) {
    try {
        var response; 
        await $.ajax({
            url,
            method,
            data,
            // headers: {"Authorization": `Bearer ${secretToken}`},
            beforeSend: function (xhr) {
                 xhr.setRequestHeader("Authorization-Token", secretToken);
            },
            success: function(data) {
                const res = data;
                response = res;
            }
        });
    } catch (error) {
        response = {error: error.responseText}
        return response;
    }

    return response;
}