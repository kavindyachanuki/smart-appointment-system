function togglePassword() {
    const passwordInput = document.getElementById("password");
    const toggleIcon = document.getElementById("toggleIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.className = "bi bi-eye-slash";
    } else {
        passwordInput.type = "password";
        toggleIcon.className = "bi bi-eye";
    }
}

function socialLogin(provider) {
    alert(`${provider} login would be implemented here`);
}

// Spinning icon style
const style = document.createElement("style");
style.textContent = `
        .spin {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    `;
document.head.appendChild(style);
