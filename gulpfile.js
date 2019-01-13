const { src, dest, watch, series, parallel } = require('gulp')
const sass = require('gulp-sass')
const webpack = require('webpack-stream')
const path = require('path')
const cleanCSS = require('gulp-clean-css')

sass.compiler = require('node-sass')

// Compile sass
const compileSASS = (cb) => {
    return src('./src/sass/main.sass')
        .pipe(sass({
            includePaths: ['node_modules']
        }).on('error', sass.logError))
        .pipe(dest('css'))
    cb()
}

// Transpile js
const transpileJS = (cb) => {
    return src('./src/js/*.js')
        .pipe(webpack( {
            mode: 'production',
            entry: './src/js/main.js',
            module: {
                rules: [
                  {
                    test: /\.m?js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                      loader: 'babel-loader',
                      options: {
                        presets: ['@babel/preset-env']
                      }
                    }
                  }
                ]
            },
            output: {
                path: path.resolve(__dirname, 'js'),
                filename: 'bundle.js'
            }
        }))
        .pipe(dest('js'))
}

// Minify CSS
const minifyCSS = (cb) => {
    return src('css/*.css')
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(dest('css'))
}

// Watch sass
const watchSASS = (cb) => {
    watch(['src/sass/*.sass', 'src/sass/*.css'], (cb)=>{
        return src('./src/sass/main.sass')
            .pipe(sass({
                includePaths: ['node_modules']
            }).on('error', sass.logError))
            .pipe(dest('css'))
        cb()
    })
}

// Watch js
const watchJS = (cb) => {
    return src('./src/js/*.js')
        .pipe(webpack( {
            mode: 'development',
            watch: true,
            entry: './src/js/main.js',
            module: {
                rules: [
                  {
                    test: /\.m?js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                      loader: 'babel-loader',
                      options: {
                        presets: ['@babel/preset-env']
                      }
                    }
                  }
                ]
            },
            output: {
                path: path.resolve(__dirname, 'js'),
                filename: 'bundle.js'
            }
        }))
        .pipe(dest('js'))
}

// Production build task
exports.build = series(compileSASS, transpileJS, minifyCSS)

// Default watch task
exports.default = parallel(watchSASS, watchJS)