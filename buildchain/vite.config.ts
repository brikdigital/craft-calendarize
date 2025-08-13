import {defineConfig} from 'vite';
import viteCompressionPlugin from 'vite-plugin-compression2';
import * as path from 'path';

// https://vitejs.dev/config/
export default defineConfig(({command}) => ({
    base: command === 'serve' ? '' : '/dist/',
    build: {
        emptyOutDir: true,
        manifest: 'manifest.json',
        outDir: '../src/web/assets/dist',
        sourcemap: true,
        rolldownOptions: {
            input: {
                app: 'src/js/main.js',
            },
        }
    },
    plugins: [
        viteCompressionPlugin({
            include: /\.(js|mjs|json|css|map)/i,
            algorithms: ['gzip', 'brotliCompress'],
        })
    ],
    resolve: {
        alias: [
            {find: '@', replacement: path.resolve(__dirname, './src')},
        ],
        preserveSymlinks: true,
    },
    server: {
        fs: {
            strict: false
        },
        host: '0.0.0.0',
        origin: 'http://localhost:' + (process.env.DEV_PORT ?? '3000'),
        port: parseInt(process.env.DEV_PORT!) ?? 3000,
        strictPort: true,
    }
}));