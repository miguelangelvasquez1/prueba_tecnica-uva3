<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Tareas</title>
    <style>
        :root {
            --bg: #0f0f13;
            --surface: #1a1a24;
            --surface2: #22222f;
            --border: #2e2e3f;
            --accent: #7c6af7;
            --accent2: #a78bfa;
            --text: #e8e6f0;
            --muted: #7a7891;
            --danger: #f87171;
            --success: #34d399;
            --warning: #fbbf24;
            --high: #f87171;
            --med: #fbbf24;
            --low: #34d399;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Georgia', 'Times New Roman', serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            background-image:
                radial-gradient(ellipse at 20% 0%, rgba(124,106,247,0.12) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 100%, rgba(167,139,250,0.08) 0%, transparent 60%);
        }

        header {
            background: rgba(26,26,36,0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 1.25rem 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: normal;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, var(--accent2), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        header a {
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            transition: background 0.2s;
        }
        header a:hover { background: var(--accent2); }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* Flash messages */
        .flash {
            padding: 0.85rem 1.2rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-left: 4px solid;
            animation: fadeIn 0.3s ease;
        }
        .flash.success { background: rgba(52,211,153,0.1); border-color: var(--success); color: var(--success); }
        .flash.error   { background: rgba(248,113,113,0.1); border-color: var(--danger);  color: var(--danger); }

        @keyframes fadeIn { from { opacity:0; transform:translateY(-8px); } to { opacity:1; transform:translateY(0); } }

        /* Forms */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 2rem;
        }

        .form-group { margin-bottom: 1.25rem; }
        label {
            display: block;
            margin-bottom: 0.4rem;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            font-family: 'Courier New', monospace;
        }

        input[type="text"], input[type="date"], textarea, select {
            width: 100%;
            background: var(--surface2);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 0.7rem 0.9rem;
            color: var(--text);
            font-size: 0.95rem;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(124,106,247,0.15);
        }
        textarea { resize: vertical; min-height: 90px; }

        select option { background: var(--surface2); }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.82rem;
            margin-top: 0.35rem;
            display: block;
        }
        input.is-invalid, textarea.is-invalid, select.is-invalid {
            border-color: var(--danger);
        }

        .btn {
            display: inline-block;
            padding: 0.65rem 1.4rem;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
            font-family: 'Courier New', monospace;
            text-decoration: none;
            transition: all 0.2s;
        }
        .btn-primary  { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: var(--accent2); }
        .btn-secondary { background: var(--surface2); color: var(--muted); border: 1px solid var(--border); }
        .btn-secondary:hover { color: var(--text); border-color: var(--accent); }
        .btn-danger { background: rgba(248,113,113,0.15); color: var(--danger); border: 1px solid rgba(248,113,113,0.3); }
        .btn-danger:hover { background: rgba(248,113,113,0.25); }
        .btn-sm { padding: 0.35rem 0.75rem; font-size: 0.78rem; }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.72rem;
            font-family: 'Courier New', monospace;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: bold;
        }
        .badge-alta  { background: rgba(248,113,113,0.15); color: var(--high); border: 1px solid rgba(248,113,113,0.3); }
        .badge-media { background: rgba(251,191,36,0.15);  color: var(--med);  border: 1px solid rgba(251,191,36,0.3); }
        .badge-baja  { background: rgba(52,211,153,0.15);  color: var(--low);  border: 1px solid rgba(52,211,153,0.3); }

        /* Task cards */
        .tarea-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.1rem 1.3rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: border-color 0.2s, transform 0.15s;
        }
        .tarea-card:hover { border-color: var(--accent); transform: translateX(3px); }
        .tarea-card.completada { opacity: 0.45; }
        .tarea-card.completada .tarea-titulo { text-decoration: line-through; color: var(--muted); }

        .tarea-main { flex: 1; min-width: 0; }
        .tarea-titulo { font-size: 1rem; margin-bottom: 0.3rem; }
        .tarea-meta { font-size: 0.8rem; color: var(--muted); font-family: 'Courier New', monospace; }
        .tarea-actions { display: flex; gap: 0.4rem; align-items: center; flex-shrink: 0; }

        .check-icon { font-size: 1.1rem; }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--muted);
        }
        .empty-state .icon { font-size: 3rem; margin-bottom: 1rem; }

        .page-title {
            font-size: 1.8rem;
            font-weight: normal;
            margin-bottom: 1.5rem;
            letter-spacing: -0.03em;
        }
    </style>
</head>
<body>

<header>
    <h1>✦ Mis Tareas</h1>
    <a href="{{ route('tareas.create') }}">+ Nueva tarea</a>
</header>

<div class="container">

    @if(session('success'))
        <div class="flash success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="flash error">
            <ul style="list-style:none;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>