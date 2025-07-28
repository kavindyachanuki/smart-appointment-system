function registrationForm() {
    return {
        currentStep: 1,
        showSuccess: false,
        form: {
            username: "",
            email: "",
            phone: "",
            role: "customer", // Default to customer
            organization_name: "",
            service_type: "",
            address: "",
            nic_number: "",
            password: "",
            password_confirmation: "",
            terms: false,
        },
        showPassword: false,
        showConfirmPassword: false,
        passwordStrength: {
            show: false,
            width: 0,
            text: "",
            colorClass: "",
            textClass: "",
        },
        passwordChecks: {
            length: false,
            uppercase: false,
            lowercase: false,
            number: false,
        },
        passwordMatch: {
            show: false,
            isValid: false,
            message: "",
        },

        nextStep() {
            if (this.currentStep < 3) {
                this.currentStep++;
            }
        },

        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },

        checkPasswordStrength() {
            const password = this.form.password;
            this.passwordStrength.show = password.length > 0;

            // Check individual requirements
            this.passwordChecks.length = password.length >= 8;
            this.passwordChecks.uppercase = /[A-Z]/.test(password);
            this.passwordChecks.lowercase = /[a-z]/.test(password);
            this.passwordChecks.number = /\d/.test(password);

            // Calculate strength
            const checks = Object.values(this.passwordChecks);
            const strength = checks.filter(Boolean).length;

            switch (strength) {
                case 1:
                    this.passwordStrength.width = 25;
                    this.passwordStrength.text = "Weak";
                    this.passwordStrength.colorClass = "bg-red-400";
                    this.passwordStrength.textClass = "text-red-300";
                    break;
                case 2:
                    this.passwordStrength.width = 50;
                    this.passwordStrength.text = "Fair";
                    this.passwordStrength.colorClass = "bg-orange-400";
                    this.passwordStrength.textClass = "text-orange-300";
                    break;
                case 3:
                    this.passwordStrength.width = 75;
                    this.passwordStrength.text = "Good";
                    this.passwordStrength.colorClass = "bg-yellow-400";
                    this.passwordStrength.textClass = "text-yellow-300";
                    break;
                case 4:
                    this.passwordStrength.width = 100;
                    this.passwordStrength.text = "Strong";
                    this.passwordStrength.colorClass = "bg-green-400";
                    this.passwordStrength.textClass = "text-green-300";
                    break;
                default:
                    this.passwordStrength.width = 0;
                    this.passwordStrength.text = "";
            }

            this.checkPasswordMatch();
        },

        checkPasswordMatch() {
            const password = this.form.password;
            const confirmPassword = this.form.password_confirmation;

            if (confirmPassword.length > 0) {
                this.passwordMatch.show = true;
                this.passwordMatch.isValid = password === confirmPassword;
                this.passwordMatch.message = this.passwordMatch.isValid
                    ? "Passwords match"
                    : "Passwords do not match";
            } else {
                this.passwordMatch.show = false;
            }
        },

        isFormValid() {
            // Step 1 validation
            if (this.currentStep === 1) {
                return (
                    this.form.username.trim() !== "" &&
                    this.form.email.trim() !== "" &&
                    this.form.phone.trim() !== ""
                );
            }

            // Step 2 validation
            if (this.currentStep === 2) {
                const roleValid = this.form.role !== "";
                const providerValid =
                    this.form.role !== "provider" ||
                    (this.form.organization_name.trim() !== "" &&
                        this.form.service_type.trim() !== "");
                return roleValid && providerValid;
            }

            // Step 3 validation (final)
            const passwordValid = Object.values(this.passwordChecks).every(
                Boolean
            );
            const passwordsMatch =
                this.form.password === this.form.password_confirmation;

            return passwordValid && passwordsMatch && this.form.terms;
        },

        handleSubmit() {
            if (this.isFormValid()) {
                // Show success animation
                this.showSuccess = true;

                // Here you would normally submit to your backend
                console.log("Form data:", this.form);

                // Reset form after 3 seconds (optional)
                setTimeout(() => {
                    this.currentStep = 1;
                    this.form = {
                        username: "",
                        email: "",
                        phone: "",
                        role: "customer",
                        organization_name: "",
                        service_type: "",
                        address: "",
                        nic_number: "",
                        password: "",
                        password_confirmation: "",
                        terms: false,
                    };
                }, 3000);
            }
        },
    };
}
