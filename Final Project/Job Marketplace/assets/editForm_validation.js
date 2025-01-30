document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("EditForm");

    form.addEventListener("submit", function (event) {
        const fullName = document.getElementById("full_name").value.trim();
        const email = document.getElementById("email").value.trim();
        const dob = document.getElementById("dob").value.trim();
        const gender = document.getElementById("gender").value.trim();
        const address = document.getElementById("address").value.trim();

        let errors = [];

        if (!/^[a-zA-Z\s]+$/.test(fullName)) {
            errors.push("Full Name can only contain letters and spaces.");
        }

        if (!/^\S+@\S+\.\S+$/.test(email)) {
            errors.push("Invalid email format.");
        }

        const dobDate = new Date(dob);
        const today = new Date();
        if (dob === "" || dobDate >= today) {
            errors.push("Please enter a valid Date of Birth.");
        }

        if (!["Male", "Female", "Other"].includes(gender)) {
            errors.push("Please select a valid gender.");
        }

        if (address.length < 4) {
            errors.push("Address must be a Valid Place.");
        }

        if (errors.length > 0) {
            event.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
