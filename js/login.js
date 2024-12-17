//Recorre el documento index
document.addEventListener('DOMContentLoaded', function() {
	const form = document.getElementById('login-form');
	const forgotPasswordBtn = document.getElementById('forgot-password');

	form.addEventListener('submit', function(e) {
		e.preventDefault();

		const username = document.getElementById('usuario').value;
		const password = document.getElementById('contra').value;
 
		if (username.trim() === '' || password.trim() === '') {
			Swal.fire({
				icon: 'error',
				title: 'Campos vacíos',
				text: 'Por favor, complete todos los campos'
			});
			return;
		}

		// Aquí puedes agregar la lógica de autenticación real
		//Por ahora, simularemos una autenticación exitosa
		if (username === 'ADMINISTRADOR' && password == 'holapapu') { 
			Swal.fire({
				icon: 'success',
				title: 'Iniciando Sesión.',
				showConfirmButton: false, 
				timer: 1500
			}).then(() => {
				window.location.href = './inicio/inicio.php';
			});
		} else {
			Swal.fire({
				icon: 'error',
				title: 'Error de Autenticación',
				text: 'Usuario o contraseña incorrectos' 
			});
		}
	});

	forgotPasswordBtn.addEventListener('click', function() {
		Swal.fire({
			icon: 'info',
			title: 'Recuperar contraseña',
			text: 'Por favor, contacte al administrador "022100518g@uandina.edu.pe".'
		});
	});
});