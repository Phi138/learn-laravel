let max = 101
let minHeight = {
  0: '0',
  full: '100%',
  screen: '100vh',
  banner: '456px'
}

for (let i = 0; i < max; i++) {
  minHeight[i] = i * 2 + 'px'
}

module.exports = {
  minHeight
}
