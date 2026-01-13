async function updateNavbar() {
    try {
        const res = await fetch('../../backend/Domain/login/GetUser.php');
        const data = await res.json();

        const userLinks = document.getElementById('user-links');
        if (!userLinks) return;

        if (data.ok) {
            userLinks.innerHTML = `
                <span>Welkom, ${data.username}</span>
                <a href="../../backend/Domain/login/Logout.php">Logout</a>
            `;
        } else {
            userLinks.innerHTML = `<a href="../login-page/login.html">Login</a>`;
        }
    } catch (err) {
        console.error('Failed to check session:', err);
    }
}

document.addEventListener('DOMContentLoaded', updateNavbar);
