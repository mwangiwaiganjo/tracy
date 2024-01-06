document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("startDate").min = today;
    document.getElementById("endDate").min = today;

    document
        .getElementById("startDate")
        .addEventListener("input", updateDateRange);
    document
        .getElementById("endDate")
        .addEventListener("input", updateDateRange);
});

function updateDateRange() {
    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
    const periodOfDays = calculateDays(startDate, endDate);
    const remainingDays = periodOfDays > 0 ? 26 - periodOfDays : 0;

    const periodDisplay = periodOfDays > 0 ? `${periodOfDays} days` : "";
    const remainingDisplay = remainingDays > 0 ? `${remainingDays} days` : "";

    document.getElementById("dateRange").value = periodDisplay;
    document.getElementById("remainingDays").value = remainingDisplay;
}

function calculateDays(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);

    if (start > end) {
        alert("End date must be equal to or after the start date.");
        return -1;
    }

    const timeDiff = Math.abs(end.getTime() - start.getTime());
    const diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

    return diffDays;
}

function submitFormAndSendEmail() {
    const eventName = document.getElementById("eventName").value;
    const startDate = document.getElementById("startDate").value;
    const endDate = document.getElementById("endDate").value;
    const recipientEmail = document.getElementById("recipientEmail").value;

    if (!eventName || !startDate || !endDate || !recipientEmail) {
        alert("Please enter all required fields.");
        return;
    }

    const periodOfDays = calculateDays(startDate, endDate);

    if (periodOfDays === -1) {
        return;
    }

    // Calculate remaining days
    const remainingDays = 26 - periodOfDays;

    // Call sendEmail function with params
    sendEmail(
        eventName,
        startDate,
        endDate,
        recipientEmail,
        periodOfDays,
        remainingDays
    );
}

function sendEmail(
    eventName,
    startDate,
    endDate,
    recipientEmail,
    periodOfDays,
    remainingDays
) {
    const params = {
        eventName: eventName,
        startDate: startDate,
        endDate: endDate,
        recipientEmail: recipientEmail,
        periodOfDays: periodOfDays,
        remainingDays: remainingDays,
    };

    const serviceID = "service_rco7yrb";
    const templateID = "template_s74chm8";

    emailjs
        .send(serviceID, templateID, params)
        .then((res) => {
            console.log(res);
            alert("Email sent successfully!");
            // Reset form fields after successful submission
            document.getElementById("eventForm").reset();
            // Reset calculated fields
            document.getElementById("dateRange").value = "";
            document.getElementById("remainingDays").value = "";
        })
        .catch((err) => {
            console.error("Error sending email:", err);
            alert("Error sending email. Please check the console for details.");
        });
}
