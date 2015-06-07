<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.header', ['title' => '模版'])
</head>
<body>
    @include('components.section-header')
    @include('components.nav')

    <div class="view-container">
        <section id="content">
            <section class="page">
                
            </section>
        </section>
    </div>
    {{-- View container end --}}
</body>
</html>