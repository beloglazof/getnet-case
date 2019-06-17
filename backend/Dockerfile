FROM tarantool/tarantool:2

COPY *.lua /opt/tarantool/
EXPOSE 8080
WORKDIR /opt/tarantool

RUN apk add --no-cache git cmake clang clang-dev make gcc g++ libc-dev linux-headers
# RUN apk add --no-cache gcc
RUN luarocks install luasocket
# CMD ["tarantool", "app.lua"]