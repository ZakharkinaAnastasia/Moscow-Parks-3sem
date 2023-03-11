document.querySelector('#phone_copy').addEventListener(
    'click',
    async (event) => {
      const code = event.target.innerText;
      await navigator.clipboard.writeText(code);
    }
  );