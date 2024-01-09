document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("startDate").min = today;
    document.getElementById("endDate").min = today;
    const eventNameInput = document.getElementById("eventName");
    const startDateInput = document.getElementById("startDate");
    const endDateInput = document.getElementById("endDate");
    const recipientEmailInput = document.getElementById("recipientEmail");
    const errorMessageElement = document.getElementById("errorMessage");

    eventNameInput.addEventListener("input", clearErrorMessage);
    startDateInput.addEventListener("input", clearErrorMessage);
    endDateInput.addEventListener("input", clearErrorMessage);
    recipientEmailInput.addEventListener("input", clearErrorMessage);

    function clearErrorMessage() {
        if (document.getElementById("eventForm").checkValidity()) {
            errorMessageElement.innerHTML = "";
        }
    document
        .getElementById("startDate")
        .addEventListener("input", updateDateRange);
    document
        .getElementById("endDate")
        .addEventListener("input", updateDateRange);
}});

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
    const errorMessageElement = document.getElementById("errorMessage");

    if (!eventName || !startDate || !endDate || !recipientEmail) {
        errorMessageElement.innerHTML = `
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Danger alert!</span>  Please fill all the required fields.
                </div>
            </div>
        `;
        return;
    }
    const periodOfDays = calculateDays(startDate, endDate);

    if (periodOfDays === -1) {
        // Reset the error message if any
        errorMessageElement.innerHTML = "";
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
    const successMessageElement = document.getElementById("successMessage");

    emailjs
        .send(serviceID, templateID, params)
        .then((res) => {
            console.log(res);
            successMessageElement.innerHTML = `
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Success alert!</span> Email sent successfully!
                    </div>
                </div>
            `;
            setTimeout(() => {
                successMessageElement.innerHTML = "";
            }, 2000);
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


