@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

@section('content')
<div style="min-height: 85vh; background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%); display: flex; align-items: center; justify-content: center; padding: 4rem 1rem;">
    <div class="container py-5">

        <h1 class="mb-10 text-center fw-bold text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Panel de Administración
        </h1>

        <div class="row g-4 justify-content-center">

            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 border-0 h-100" style="background-color: #cce5ff; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-header fs-5 fw-semibold bg-transparent border-0 text-primary d-flex align-items-center gap-2">
                        <i class="bi bi-people-fill fs-4"></i> Clientes
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text flex-grow-1 text-dark">Administrar clientes registrados.</p>
                        <a href="{{ route('clientes.index') }}" 
                           class="btn btn-primary mt-auto rounded-pill fw-semibold shadow-sm text-black"
                           style="transition: background-color 0.3s ease;">
                            Ir a Clientes
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 border-0 h-100" style="background-color: #d4edda; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-header fs-5 fw-semibold bg-transparent border-0 text-success d-flex align-items-center gap-2">
                        <i class="bi bi-gift-fill fs-4"></i> Premios
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text flex-grow-1 text-dark">Gestionar premios disponibles.</p>
                        <a href="{{ route('premios.index') }}" 
                           class="btn btn-success mt-auto rounded-pill fw-semibold shadow-sm text-black"
                           style="transition: background-color 0.3s ease;">
                            Ir a Premios
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm rounded-4 border-0 h-100" style="background-color: #d1ecf1; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                    <div class="card-header fs-5 fw-semibold bg-transparent border-0 text-info d-flex align-items-center gap-2">
                        <i class="bi bi-briefcase-fill fs-4"></i> Beneficios
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="card-text flex-grow-1 text-dark">Ver empresas con convenio.</p>
                        <a href="{{ route('beneficios.index') }}" 
                           class="btn btn-info mt-auto rounded-pill fw-semibold shadow-sm text-black"
                           style="transition: background-color 0.3s ease;">
                            Ir a Beneficios
                        </a>
                    </div>
                </div>
            </div>

            

            <div id="listaContactos" class="mt-3">
                <button id="btnContactos" class="btn btn-warning rounded-pill fw-semibold mt-3">
                📇 Importar Contactos
                </button>
            </div>

        </div>
    </div>
</div>
        <footer class="text-center mt-5 text-muted" style="font-size: 0.9rem;">
            &copy; {{ date('Y') }} fidelizacion. Todos los derechos reservados.
        </footer>
<style>
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    .btn:hover {
        filter: brightness(0.9);
    }
</style>
<script>
document.getElementById("btnContactos").addEventListener("click", async () => {
    if (!("contacts" in navigator && "ContactsManager" in window)) {
        alert("❌ Tu navegador no soporta la API de contactos.");
        return;
    }

    try {
        const props = ["name", "tel", "email"];
        const opts = { multiple: true };

        const contactos = await navigator.contacts.select(props, opts);

        let html = "<h5>📇 Contactos seleccionados:</h5><ul class='list-group'>";

        contactos.forEach(c => {
            html += `
                <li class="list-group-item">
                    <strong>Nombre:</strong> ${c.name?.join(", ")} <br>
                    <strong>Tel:</strong> ${c.tel?.join(", ")} <br>
                    <strong>Email:</strong> ${c.email?.join(", ")}
                </li>
            `;
        });

        html += "</ul>";
        document.getElementById("listaContactos").innerHTML = html;

        console.log("Contactos importados:", contactos);

    } catch (err) {
        console.error("Error al seleccionar contactos", err);
    }
});
</script>

@endsection



