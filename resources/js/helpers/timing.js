export async function nextFrame() {
    return new Promise((resolve) => {
        requestAnimationFrame(() => {
            resolve();
        });
    })
}
