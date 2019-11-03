<template>
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card card-default">
              <div class="card-body">
                  <h4>Hi,</h4>
                  <p>Welcome to the <i>Basic Technical Test Apps</i> !</p>
                  <p>This application will help you to handle use cases below:</p>
                  <ol>
                      <li>
                          <p>Sum X & Y, and print the result</p>
                          <ul class="input-output">
                              <li>Input : 1, 2</li>
                              <li>Output : 3</li>
                          </ul>
                          <p><router-link to="/sum" class="btn try-link">Let's try >></router-link></p>
                      </li>
                      <li>
                          <p>Multiply X & Y, and print the result</p>
                          <ul class="input-output">
                              <li>Input : 1, 2</li>
                              <li>Output : 2</li>
                          </ul>
                          <p><router-link to="/multiply" class="btn try-link">Let's try >></router-link></p>
                      </li>
                      <li>
                          <p>Find first N prime number, and print the result</p>
                          <ul class="input-output">
                              <li>Input: 4</li>
                              <li>Output : 2, 3, 5, 7</li>
                          </ul>
                          <p><router-link to="/prime-number" class="btn try-link">Let's try >></router-link></p>
                      </li>
                      <li>
                          <p>Find the first N Fibonacci sequence, and print the result</p>
                          <ul class="input-output">
                              <li>Input: 4</li>
                              <li>Output : 0, 1, 1, 2 </li>
                          </ul>
                          <p><router-link to="/fibonacci" class="btn try-link">Let's try >></router-link></p>
                      </li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>