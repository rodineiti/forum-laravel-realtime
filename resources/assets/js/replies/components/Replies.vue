<template>
    <div>
        <div class="card">
            <div class="card-content">
                <div class="card-title">Rodinei {{ replied }}</div>

                <blockquote>
                    khjaksfjhakshfakshfdkashfksdfhajsflakhfaklsjdfhaksdfhaklsfdhakshfakfdhlakdhfalkdf
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-title">Rodinei de Jesus</div>

                <blockquote>
                    khjaksfjhakshfakshfdkashfksdfhajsflakhfaklsjdfhaksdfhaklsfdhakshfakfdhlakdhfalkdf
                </blockquote>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="card-title">Rodinei de Jesus</div>

                <blockquote>
                    khjaksfjhakshfakshfdkashfksdfhajsflakhfaklsjdfhaksdfhaklsfdhakshfakfdhlakdhfalkdf
                </blockquote>
            </div>
        </div>
        <div class="card grey lighten-4">
            <div class="card-content">
                <span class="card-title">{{ reply }}</span>

                <form>
                    <div class="input-field">
                        <textarea rows="10" class="materialize-textarea" :placeholder="yourAnswer"></textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">{{ send }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'replied',
            'reply',
            'yourAnswer',
            'send'
        ]
    }
</script>
