// Dummy data

const dummyData = {
    totalOrders: 45,
    totalRequests: 7,
    pendingRequests: 3,
    completedRequests: 35,
};


function updateStatisticsWithAnimation() {
    const animationDuration = 1000;
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min(
                (timestamp - startTimestamp) / duration,
                1
            );
            element.innerText = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    animateValue(
        document.getElementById("totalOrders"),
        0,
        dummyData.totalOrders,
        animationDuration
    );
    animateValue(
        document.getElementById("totalRequests"),
        0,
        dummyData.totalRequests,
        animationDuration
    );
    animateValue(
        document.getElementById("pendingRequests"),
        0,
        dummyData.pendingRequests,
        animationDuration
    );
    animateValue(
        document.getElementById("completedRequests"),
        0,
        dummyData.completedRequests,
        animationDuration
    );
}

// Call the function to update statistics with animation
updateStatisticsWithAnimation();

const dummyAccounts = [
    { id: "01", name: "Admin Tunefy", email: "admin@gmail.com", role: "Admin" },
    {
        id: "02",
        name: "Taylor Swift",
        email: "swifties@gmail.com",
        role: "User",
    },
];

function fillAccountTable() {
    const tableBody = document.getElementById("accountTableBody");
    tableBody.innerHTML = ""; // Clear existing rows

    dummyAccounts.forEach((account) => {
        const row = `
            <tr>
                <td>${account.id}</td>
                <td>${account.name}</td>
                <td>${account.email}</td>
                <td>${account.role}</td>
                <td>
                    <button>Edit</button>
                    <button>Delete</button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

// Call the function to fill the account table with dummy data
fillAccountTable();
