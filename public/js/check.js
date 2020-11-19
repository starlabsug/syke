$.ajax({
    type: 'POST',
    dataType: "json",
    url: 'check.php',
    data: data,
    success: (data) => {
        try {
            data = JSON.parse(data);
        } catch (e) {}

    }
});